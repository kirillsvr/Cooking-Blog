@extends('front.layouts.layout')


@section('content')
    <x-front-title
        header="Авторы"
        breadcrumb="front.breadcrumb"
        paramBreadcrumb="Авторы"
    />

<!-- Popular Home Chef Section Start Here -->
<section class="popular-chef style-2 padding-tb">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                @foreach($users as $user)
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="chef-item">
                        <div class="chef-inner">
                            <div class="chef-thumb">
                                <img src="assets/front/images/chef/01.jpg" alt="food-chef">
                            </div>
                            <div class="chef-content">
                                <div class="chef-author">
                                    <a href="{{route('authors.show', $user->id)}}">
                                        <img src="/uploads/{{$user->image}}" alt="chef-author">
                                    </a>
                                </div>
                                <h5 class="mb-3"><a href="{{route('authors.show', $user->id)}}">{{$user->name}}</a></h5>
                                <div class="scocial-share">
                                    <a href="{{route('authors.show', $user->id)}}" class="food-btn"><span><i class="icofont-ui-user"></i> Подробнее</span></a>
                                </div>
                                <div class="chef-footer">
                                    <div class="chef-earn chef-con">
                                        <h6>{{$user->posts->count()}}</h6>
                                        <a href="{{route('blog.index', 'author=' . $user->id)}}">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($user->posts->count(), 'статья')}}</a>
                                    </div>
                                    <div class="chef-recipe chef-con">
                                        <h6>{{$user->recipes->count()}}</h6>
                                        <a href="{{route('front.recipes.index', 'author=' . $user->id)}}">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($user->recipes->count(), 'рецепт')}}</a>
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
