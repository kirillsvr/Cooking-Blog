@extends('front.layouts.layout')

@section('content')
    <x-front-title
        header="Блог"
        breadcrumb="front.breadcrumb"
        paramBreadcrumb="Блог"
    />

    <div class="blog-section blog-page padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <article>
                            @if($posts->count())
                                @foreach($posts as $post)
                                    <div class="post-item">
                                        <div class="post-inner">
                                            <div class="post-thumb">
                                                <a href="{{route('article.show', $post->slug)}}">
                                                    <img src="/uploads/{{$post->thumbnail}}" alt="blog">
                                                </a>
                                            </div>
                                            <div class="post-content">
                                                <h4><a href="{{route('article.show', $post->slug)}}">{{$post->title}}</a></h4>
                                                <div class="meta-post">
                                                    <ul>
                                                        <li>
                                                            <i class="icofont-calendar"></i>
                                                            <a href="#" class="date">{{$post->created_at->translatedFormat('d F Y')}} </a>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-ui-user"></i>
                                                            <a href="{{route('authors.show', $post->user->id)}}" class="author">Автор: {{$post->user->name}}</a>
                                                        </li>
                                                        <li>
                                                            <i class="icofont-speech-comments"></i>
                                                            <a href="{{route('article.show', $post->slug)}}" class="comments">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($post->comments->where('is_published', 1)->count(), 'комментарий')}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p>{{$post->description}}</p>
                                                <a href="{{route('article.show', $post->slug)}}" class="food-btn"><span>Подробнее</span></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>Статей не найдено...</p>
                            @endif

                            {{$posts->links('vendor.pagination.front')}}


                        </article>
                    </div>
                    <x-blog-sidebar />
                </div>
            </div>
        </div>
    </div>
@endsection
