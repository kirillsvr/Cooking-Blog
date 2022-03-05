@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
    <x-admin-titles header="Рецепт «{{$recipe->title}}»" />
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <x-admin-subtitles headtitle="Список комментариев" subtitle="На этой странице можно отредактировать комментарии"/>
                    </div>
                    <div class="col-md-10 offset-md-1 mt-5 mb-5">
                        @csrf
                        @if(!empty($comments))

                            <?php function renderComments($comments, int $nesting, bool $parentDisable){?>
                                <?php foreach($comments as $value):?>
                                    <div class="card" style="margin-left: <?=40*$nesting?>px">
                                        <div class="job-search">
                                            <div class="card-body">
                                                <div class="media row">
                                                    <div class="media-body col-md-8">
                                                        <h6 class="f-w-600"><?=$value['name']; echo $nesting?></h6>
                                                        <p> <?=$value['updated_at'];?></p>
                                                    </div>
                                                    <div class="row col-md-4">
                                                        <div class="col-md-6 text-end icon-state">
                                                            <label class="switch">
                                                                <input type="checkbox" class="switch-comments" @if($value['is_published']) checked @endif @if($parentDisable) disabled @endif data-id="{{$value['id']}}"><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="btn btn-danger delete-comments" data-id="{{$value['id']}}" href="javascript:void(0)">Удалить</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>
                                                    <?=$value['comment'];?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($value['childs'])):?>
                                            <?php renderComments($value['childs'], $nesting + 1, $value['is_published'] == 0);?>
                                    <?php endif;?>
                                <?php endforeach;?>
                            <?php };?>

                            <?php renderComments($comments, 0, false);?>

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

@section('dopScripts')
    <script src="{{asset('assets/admin/js/sweet-alert/sweetalert.min.js')}}"></script>
@endsection
