@extends('admin.layouts.layout')

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
                                    <div class="card-body row">
                                    @for($i = 0; $i < count($posts); $i++)
                                        @if($posts->currentPage() === 1 && $i < 2)
                                            <div class="col-xl-6 set-col-12 box-col-12">
                                                <div class="card">
                                                    <div class="blog-box blog-shadow"><img class="img-fluid" src="{{asset('assets/admin/images/blog/blog.jpg')}}" alt="">
                                                        <div class="blog-details">
                                                            <p>25 July 2018</p>
                                                            <h4><a href="{{route('posts.edit', $posts[$i]->id)}}">{{$posts[$i]->title}}</a></h4>
                                                            <ul class="blog-social">
                                                                <li><i class="icofont icofont-user"></i>Mark Jecno</li>
                                                                <li><i class="icofont icofont-thumbs-up"></i>02 Hits</li>
                                                                <li><i class="icofont icofont-ui-chat"></i>598 Comments</li>
                                                            </ul>
                                                            <form action="{{route('posts.destroy', $posts[$i]->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">Удалить</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @continue
                                        @endif

                                        <div class="col-md-6 col-xl-3 box-col-6">
                                        <div class="card">
                                            <div class="blog-box blog-grid text-center"><img class="img-fluid top-radius-blog" src="{{asset('assets/admin/images/blog/blog-5.jpg')}}" alt="">
                                                <div class="blog-details-main">
                                                    <ul class="blog-social">
                                                        <li>{{$posts[$i]->created_at}}</li>
                                                        <li>by: Admin</li>
                                                        <li>0 Hits</li>
                                                        <li>{{$posts[$i]->category->title}}</li>
                                                        <li>{{$posts[$i]->tags->pluck('title')->join(', ')}}</li>
                                                    </ul>
                                                    <hr>
                                                    <h6 class="blog-bottom-details"><a href="{{route('posts.edit', $posts[$i]->id)}}">{{$posts[$i]->title}}</a></h6>
                                                    <form action="{{route('posts.destroy', $posts[$i]->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
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
