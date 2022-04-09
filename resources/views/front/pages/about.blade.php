@extends('front.layouts.layout')


@section('content')
    <x-front-title
        header="О Нас"
        breadcrumb="front.breadcrumb"
        paramBreadcrumb="О Нас"
    />


    <!-- About Section Start here -->
    <section class="about about-page padding-tb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="about-thumb">
                        <img src="/assets/front/images/about/01.png" alt="about-food">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <div class="section-header">
                            <span>Добро пожаловать на наш блог</span>
                            <h3>{{$about->title}}</h3>
                        </div>
                        <div class="section-wrapper">
                            <p>{{$about->content}}</p>
                            <a href="{{route('home')}}" class="food-btn style-2"><span>Начать просмотр нашего блога</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section Ending here -->

    <!-- Popular Home Chef Section Start Here -->
    <section class="popular-chef padding-tb" style="background-color: #fafeff;">
        <div class="container">
            <div class="section-header">
                <h3>Популярные авторы</h3>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    @foreach($authors as $author)
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="chef-item">
                            <div class="chef-inner">
                                <div class="chef-thumb">
                                    <img src="/assets/front/images/chef/01.jpg" alt="food-chef">
                                </div>
                                <div class="chef-content">
                                    <div class="chef-author">
                                        <a href="#">
                                            <img src="/uploads/{{$author->image}}" alt="chef-author">
                                        </a>
                                    </div>
                                    <h5><a href="{{route('authors.show', $author->id)}}">{{$author->name}}</a></h5>
                                    <p>Month Top Homechef</p>
                                    <div class="scocial-share">
                                        <a href="#" class="food-btn"><span><i class="icofont-ui-user"></i> follow</span></a>
                                    </div>
                                    <div class="chef-footer">
                                        <div class="chef-earn chef-con">
                                            <h6>{{$author->posts->count()}}</h6>
                                            <a href="#">Посты</a>
                                        </div>
                                        <div class="chef-recipe chef-con">
                                            <h6>{{$author->recipes->count()}}</h6>
                                            <a href="">Рецепты</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Home Chef Section Ending Here -->
@endsection
