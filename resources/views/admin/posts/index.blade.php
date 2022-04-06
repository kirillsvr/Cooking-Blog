@extends('admin.layouts.layout')

@section('dopStyles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/sweetalert2.css')}}">
@endsection

@section('content')
        <x-admin-titles
            header="Посты"
            breadcrumb="admin.breadcrumb"
            paramBreadcrumb="Посты"
            routeBreadcrumb='posts.index'
        />
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <x-admin-subtitles headtitle="Список постов" subtitle=""/>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('posts.create')}}" class="btn btn-primary">Добавить пост</a>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                @if(count($posts))
                                    @csrf
                                    <div class="card-body row">
                                    @foreach($posts as $post)
                                        <div class="col-md-6 col-xl-3 box-col-6">
                                        <div class="card">
                                            <div class="blog-box blog-grid text-center product-box">
                                                <div class="product-img">
                                                    <img class="img-fluid top-radius-blog" src="/uploads/{{$post->thumbnail}}" alt="">
                                                    <div class="product-hover">
                                                        <ul>
                                                            <li>
                                                                <a class="btn" href="{{route('posts.edit', $post->id)}}"><i class="icon-pencil"></i></a>
                                                            </li>
                                                            <li class="trash">
                                                                <button class="btn del-post" type="button" data-id="{{$post->id}}"><i class="icon-trash"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="blog-details-main">
                                                    <ul class="blog-social">
                                                        <li>{{$post->created_at->translatedFormat('d F Y')}}</li>
                                                        <li>{{$post->user->name}}</li>
                                                    </ul>
                                                    <hr>
                                                    <h6 class="blog-bottom-details"><a href="{{route('posts.edit', $post->id)}}" class="text-decoration-none text-reset">{{$post->title}}</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                    @if($posts->hasPages())
                                    <div class="card-footer text-end">
                                        {{$posts->links()}}
                                    </div>
                                    @endif
                                @else
                                <div class="card-body">
                                    Статей пока нет...
                                </div>
                                @endif
                            </div>
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
