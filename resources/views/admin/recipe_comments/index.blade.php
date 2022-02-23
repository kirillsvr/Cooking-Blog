@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Sample Page</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Sample Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Hoverable rows</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                    </div>
                    <div class="col-md-10 offset-md-1 mt-5 mb-5">
                        @if(!empty($comments))

                            <?php function renderComments($comments, int $nesting){?>
                                <?php foreach($comments as $value):?>
                                    <div class="card" style="margin-left: <?=40*$nesting?>px">
                                        <div class="job-search">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h6 class="f-w-600"><?=$value['name']; echo $nesting?></h6>
                                                        <p> <?=$value['updated_at'];?></p>
                                                    </div>
                                                </div>
                                                <p>
                                                    <?=$value['comment'];?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($value['childs'])):?>
                                            <?php renderComments($value['childs'], $nesting + 1);?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php };?>

                            <?php renderComments($comments, 0);?>

                        @else
                            Комментариев пока нет...
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
