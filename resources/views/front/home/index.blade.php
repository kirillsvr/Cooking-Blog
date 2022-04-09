@extends('front.layouts.layout')


@section('content')
    <!-- Banner Section Start Here -->
    <section class="banner style-3">
        <div class="container">
            <div class="">
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <div class="banner-item">
                                <div class="banner-inner">
                                    <div class="banner-thumb">
                                        <img src="/uploads/{{$banner->recipe->thumbnail}}" alt="banner">
                                    </div>
                                    <div class="banner-content">
                                        <div class="banner-content-area">
                                            <div class="meta-tag">
                                                <div class="categori">
                                                    <a href="{{route('front.recipes.index', 'category=' . $banner->recipe->category[0]->id)}}">{{$banner->recipe->category[0]->title}}</a>
                                                </div>
                                                <div class="rating rating-container">
                                                    <select class="one" data-raiting="{{$banner->recipe->raiting()->avg('value') ?? '-1'}}">
                                                        <option value="1">{{$banner->recipe->id}}</option>
                                                        <option value="2">{{$banner->recipe->id}}</option>
                                                        <option value="3">{{$banner->recipe->id}}</option>
                                                        <option value="4">{{$banner->recipe->id}}</option>
                                                        <option value="5">{{$banner->recipe->id}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h4><a href="{{route('front.recipe.index', $banner->recipe->slug)}}">{{$banner->recipe->title}}</a></h4>
                                            <div class="meta-post">
                                                <ul>
                                                    <li>
                                                        @if(isset($recipe->user->image))
                                                        <img src="/uploads/{{$recipe->user->image}}" alt="food-recipe">
                                                        @endif
                                                        <a href="{{route('authors.show', $banner->recipe->user[0]->id)}}" class="author">{{$banner->recipe->user[0]->name}} </a>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-clock-time"></i>
                                                        <a href="{{route('front.recipe.index', $banner->recipe->slug)}}" class="date">Время приготовления: {{$banner->recipe->cook_time}} мин.</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p>{!! \Illuminate\Support\Str::limit($banner->recipe->content, 150, '...') !!}</p>
                                            <div class="meta-post mb-0">
                                                <ul>
                                                    <li>
                                                        <i class="icofont-eye"></i>
                                                        <a href="{{route('front.recipe.index', $banner->recipe->slug)}}" class="view">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($banner->recipe->views, 'просмотр')}}</a>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-speech-comments"></i>
                                                        <a href="{{route('front.recipe.index', $banner->recipe->slug)}}" class="comment">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($banner->recipe->comments->count(), 'комментарий')}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <div class="banner-bitem">
                                <div class="banner-binner">
                                    <div class="banner-bcontent">
                                        <div class="meta-tag">
                                            <div class="categori">
                                                <a href="{{route('front.recipes.index', 'category=' . $banner->recipe->category[0]->id)}}">{{$banner->recipe->category[0]->title}}</a>
                                            </div>
                                        </div>
                                        <h6>{{$banner->recipe->title}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section Ending Here -->

    <!-- Recipes Categories Section Start Here -->
    @if($categories->count())
    <section class="recipe-categori padding-tb home-3 bg-body pb-0">
        <div class="container">
            <div class="section-header style-2">
                <h4>Рецепты</h4>
                <a href="{{route('front.recipes.index')}}" class="text-btn">Все рецепты<i class="icofont-rounded-double-right"></i></a>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    @foreach($categories as $category)
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="recipe-item">
                            <div class="recipe-thumb">
                                <img src="/uploads/{{$category->thumbnail}}" alt="food-recipe">
                            </div>
                            <div class="recipe-content">
                                <a href="{{route('front.recipes.index', 'category=' . $category->id)}}">{{$category->title}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Recipes Categories Section Ending Here -->

    <!-- Recipes Categories Section Start Here -->
    <section class="recent-recipe home-3 padding-tb bg-body pb-0">
        <div class="container">
            <div class="section-header style-2">
                <h4>Последние рецепты</h4>
                <a href="{{route('front.recipes.index')}}" class="text-btn">Все рецепты<i class="icofont-rounded-double-right"></i></a>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    @foreach($recentRecipe as $recipe)
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="recipe-item">
                            <div class="recipe-thumb">
                                <a href="{{route('front.recipe.index', $recipe->slug)}}"> <img src="/uploads/{{$recipe->thumbnail}}" alt="food-recipe"></a>
                            </div>
                            <div class="recipe-content">
                                <div class="meta-tag">
                                    <div class="categori">
                                        <a href="{{route('front.recipes.index', 'category=' . $recipe->recipeCategory->id)}}">{{$recipe->recipeCategory->title}}</a>
                                    </div>
                                    <div class="rating">
                                        <select class="one" data-raiting="{{$recipe->raiting->avg('value') ?? '-1'}}">
                                            <option value="1">{{$recipe->id}}</option>
                                            <option value="2">{{$recipe->id}}</option>
                                            <option value="3">{{$recipe->id}}</option>
                                            <option value="4">{{$recipe->id}}</option>
                                            <option value="5">{{$recipe->id}}</option>
                                        </select>
                                    </div>
                                </div>
                                <h6><a href="{{route('front.recipe.index', $recipe->slug)}}">{{$recipe->title}}</a></h6>
                                <div class="meta-post">
                                    <ul>
                                        <li>
                                            @if(isset($recipe->user->image))
                                            <img src="/uploads/{{$recipe->user->image}}" alt="food-recipe">
                                            @endif
                                            <a href="{{route('authors.show', $recipe->user->id)}}" class="author">{{$recipe->user->name}} </a>
                                        </li>
                                        <li>
                                            <i class="icofont-clock-time"></i>
                                            <a href="{{route('front.recipe.index', $recipe->slug)}}" class="date">Время: {{$recipe->cook_time}} мин.</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Recipes Categories Section Ending Here -->


    <!-- Blog Section Start here -->
    <section class="blog-section padding-tb bg-body home-3">
        <div class="container">
            <div class="section-header style-2">
                <h4>Популярные рецепты</h4>
                <a href="{{route('front.recipes.index')}}" class="text-btn">Все рецепты<i class="icofont-rounded-double-right"></i></a>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-12 blog-left">
                        @foreach($popularRecipe as $recipe)
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="{{route('front.recipe.index', $recipe->slug)}}">
                                        <img src="/uploads/{{$recipe->thumbnail}}" alt="petuk-blog">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <div class="meta-tag">
                                        <div class="categori">
                                            <a href="{{route('front.recipes.index', 'category=' . $recipe->recipeCategory->id)}}">{{$recipe->recipeCategory->title}}</a>
                                        </div>
                                        <div class="rating">
                                            <select class="one" data-raiting="{{$recipe->raiting->avg('value') ?? '-1'}}">
                                                <option value="1">{{$recipe->id}}</option>
                                                <option value="2">{{$recipe->id}}</option>
                                                <option value="3">{{$recipe->id}}</option>
                                                <option value="4">{{$recipe->id}}</option>
                                                <option value="5">{{$recipe->id}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5><a href="{{route('front.recipe.index', $recipe->slug)}}">{{$recipe->title}}</a></h5>
                                    <div class="meta-post">
                                        <ul>
                                            <li>
                                                <img src="/uploads/{{$recipe->user->image}}" alt="food-recipe">
                                                <a href="{{route('authors.show', $recipe->user->id)}}" class="author">{{$recipe->user->name}} </a>
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i>
                                                <a href="{{route('front.recipe.index', $recipe->slug)}}" class="date">Время: {{$recipe->cook_time}} мин.</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>{!! \Illuminate\Support\Str::limit($recipe->content, 150, '...') !!}</p>
                                    <a href="#" class="food-btn style-2"><span>Подробнее</span></a>
                                </div>
                            </div>
                        </div>
                            @break
                        @endforeach
                    </div>
                    <div class="col-lg-6 col-12 blog-right">
                        @foreach($popularRecipe as $recipe)
                            @if ($loop->first) @continue @endif
                            <div class="col-md-6 col-12">
                                <div class="post-item">
                                    <div class="post-inner">
                                        <div class="post-thumb">
                                            <a href="{{route('front.recipe.index', $recipe->slug)}}">
                                                <img src="/uploads/{{$recipe->thumbnail}}" alt="petuk-blog">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="meta-tag">
                                                <div class="categori">
                                                    <a href="{{route('front.recipes.index', 'category=' . $recipe->recipeCategory->id)}}">{{$recipe->recipeCategory->title}}</a>
                                                </div>
                                            </div>
                                            <h6><a href="{{route('front.recipe.index', $recipe->slug)}}">{{$recipe->title}}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section Ending here -->

    <!-- Contact From Section Start Here -->
    <section class="contact-us">
        <div class="bg-shape-style"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-4 col-lg-6 col-12">
                    <div class="contact-from">
                        <h5>Регистрация</h5>
                        <form action="{{route('registerWithOutPass')}}" method="POST" class="register-without-pass needs-validation">
                            @csrf
                            <input type="text" name="name" placeholder="Ваше имя" class="form-control" required>
                            <input type="email" name="email" placeholder="Ваш Email" class="form-control" required>
                            <input type="submit" value="зарегистрироваться">
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-12">
                    <div class="contact-home-chef">
                        <div class="section-header">
                            <h3>Стань автором</h3>
                            <p>Для этого нужно заполнить данные и подождать пока администратор одобрит вашу кандидатуру</p>
                        </div>
                        <div class="section-wrapper">
                            <div class="contact-count-item">
                                <div class="contact-count-inner">
                                    <div class="contact-count-thumb">
                                        <img src="/assets/front/images/contac/icon/01.png" alt="food-contact">
                                    </div>
                                    <div class="contact-count-content">
                                        <h5><span class="counter">{{$countRecipes}}</span></h5>
                                        <p>{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($countRecipes, 'рецепт')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-count-item">
                                <div class="contact-count-inner">
                                    <div class="contact-count-thumb">
                                        <img src="/assets/front/images/contac/icon/03.png" alt="food-contact">
                                    </div>
                                    <div class="contact-count-content">
                                        <h5><span class="counter">{{$countPosts}}</span></h5>
                                        <p>{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($countPosts, 'статья')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-count-item">
                                <div class="contact-count-inner">
                                    <div class="contact-count-thumb">
                                        <img src="/assets/front/images/contac/icon/02.png" alt="food-contact">
                                    </div>
                                    <div class="contact-count-content">
                                        <h5><span class="counter">{{$countAuthors}}</span></h5>
                                        <p>{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($countAuthors, 'автор')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="contact-thumb">
                        <img src="/assets/front/images/contac/01.png" alt="food-contact">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact From Section Ending Here -->

    <!-- Blog Section Start here -->
    <section class="blog-section trending padding-tb bg-body home-3">
        <div class="container">
            <div class="section-header style-2">
                <h4>Популярные посты</h4>
                <a href="{{route('blog.index')}}" class="text-btn">Все посты<i class="icofont-rounded-double-right"></i></a>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    @foreach($popularPost as $post)
                        <div class="col-xl-6  col-12">
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <a href="{{route('article.show', $post->slug)}}"><img src="/uploads/{{$post->thumbnail}}" class="img-posts" alt="trending-blog"></a>
                                        <div class="post-content">
                                            <div class="meta-tag">
                                                <div class="categori">
                                                    <a href="{{route('front.recipes.index', 'category=' . $post->category->id)}}">{{$post->category->title}}</a>
                                                </div>
                                            </div>
                                            <h5><a href="{{route('article.show', $post->slug)}}">{{$post->title}}</a></h5>
                                            <div class="meta-post">
                                                <ul>
                                                    <li>
                                                        <i class="icofont-calendar"></i>
                                                        <a href="{{route('article.show', $post->slug)}}" class="date">{{$post->created_at->translatedFormat('d F Y')}}</a>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-eye"></i>
                                                        <a href="{{route('article.show', $post->slug)}}" class="view">{{$post->views}}</a>
                                                    </li>
                                                    <li>
                                                        <i class="icofont-speech-comments"></i>
                                                        <a href="{{route('article.show', $post->slug)}}" class="comment">{{$post->comments->count()}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @break
                    @endforeach

                    @foreach($popularPost as $post)
                        @if ($loop->first) @continue @endif
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <a href="{{route('article.show', $post->slug)}}">
                                            <img src="/uploads/{{$post->thumbnail}}" alt="trending-blog">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="meta-tag">
                                            <div class="categori">
                                                <a href="{{route('front.recipes.index', 'category=' . $post->category->id)}}">{{$post->category->title}}</a>
                                            </div>
                                        </div>
                                        <h6><a href="{{route('article.show', $post->slug)}}">{{$post->title}}</a></h6>
                                        <div class="meta-post">
                                            <ul>
                                                <li>
                                                    <i class="icofont-calendar"></i>
                                                    <a href="{{route('article.show', $post->slug)}}" class="date">{{$post->created_at->translatedFormat('d F Y')}}</a>
                                                </li>
                                            </ul>
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
    <!-- Blog Section Ending here -->
@endsection
