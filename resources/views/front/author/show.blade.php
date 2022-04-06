@extends('front.layouts.layout')


@section('content')
    <x-front-title
        header="{{$user->name}}"
        breadcrumb="front.author"
        paramBreadcrumb="{{$user->id}}"
    />

    <!-- Popular Home Chef Section Start Here -->
    <div class="popular-chef single padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <article>
                            <div class="chef-item">
                                <div class="chef-inner">
                                    <div class="chef-thumb">
                                        <img src="/assets/front/images/chef/01.jpg" alt="food-chef">
                                    </div>
                                    <div class="chef-content">
                                        <div class="chef-author">
                                            <img src="/uploads/{{$user->image}}" alt="chef-author">
                                        </div>
                                        <div class="chef-desc">
                                            <div class="chef-desc-top">
                                                <div class="title">
                                                    <h5>{{$user->name}}</h5>
                                                    <p>Month Top <a href="#">Homechef</a></p>
                                                </div>
                                                <div class="scocial-share">
                                                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                                    <a href="#" class="food-btn"><span><i class="icofont-ui-user"></i> follow</span></a>
                                                </div>
                                            </div>
                                            <div class="chef-desc-middle">
                                                <p>{{$user->info}}</p>
                                                <ul>
                                                    <li><span>Регистрация</span>: {{$user->created_at->translatedFormat('d F Y')}}</li>
                                                </ul>
                                            </div>
                                            <div class="chef-footer">
                                                <div class="chef-menu chef-con">
                                                    <h6>{{$user->posts->count()}}</h6>
                                                    <a href="#">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($user->posts->count(), 'статья')}}</a>
                                                </div>
                                                <div class="chef-recipe chef-con">
                                                    <h6>{{$user->recipes->count()}}</h6>
                                                    <a href="#">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::makeOnlyWord($user->recipes->count(), 'рецепт')}}</a>
                                                </div>
                                                <div class="chef-followers chef-con">
                                                    <h6>{{$user->recipes->sum('views') + $user->posts->sum('views')}}</h6>
                                                    <a href="#">просмотров</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="related">
                                <ul class="tab-bar">
                                    @if($recipes->count())
                                    <li class="tablinks" id="defaultOpen" onclick="openCity(event, 'recipe')">
                                        <span>Рецепты</span>
                                    </li>
                                    @endif
                                    @if($posts->count())
                                    <li class="tablinks" onclick="openCity(event, 'food_menu')">
                                        <span>Статьи</span>
                                    </li>
                                    @endif
                                </ul>
                                @if($recipes->count())
                                <div id="recipe" class="tabcontent">
                                    <div class="recent-recipe">
                                        <div class="section-wrapper">
                                            <div class="row justify-content-center">
                                                @foreach($recipes as $recipe)
                                                    <div class="col-md-6 col-12">
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
                                                                        <i class="icofont-star"></i>
                                                                        <i class="icofont-star"></i>
                                                                        <i class="icofont-star"></i>
                                                                        <i class="icofont-star"></i>
                                                                        <i class="icofont-star"></i>
                                                                        <span>(5.5)</span>
                                                                    </div>
                                                                </div>
                                                                <h6><a href="{{route('front.recipe.index', $recipe->slug)}}">{{$recipe->title}}</a></h6>
                                                                <div class="meta-post">
                                                                    <ul>
                                                                        <li>
                                                                            <img src="/uploads/{{$user->image}}" alt="food-recipe">
                                                                            <a href="{{route('authors.show', $user->id)}}" class="author">{{$user->name}} </a>
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
                                            <div class="d-flex justify-content-center mt-4">
                                                <a href="{{route('front.recipes.index', 'author=' . $user->id)}}" class="food-btn"><span>Все рецепты</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($posts->count())
                                <div id="food_menu" class="tabcontent">
                                    <div class="popular-foods">
                                        <div class="section-wrapper">
                                            <div class="row justify-content-center">
                                                @foreach($posts as $post)
                                                <div class="col-md-6 col-12 mb-4">
                                                    <div class="p-food-item">
                                                        <div class="p-food-inner">
                                                            <div class="p-food-thumb">
                                                                <img src="/uploads/{{$post->thumbnail}}" alt="p-food">
                                                            </div>
                                                            <div class="p-food-content">
                                                                <h6><a href="{{route('article.show', $post->slug)}}">{{$post->title}}</a></h6>
                                                                @if($post->tags->count())
                                                                <div class="p-food-group">
                                                                    <span>Рубрики :</span>
                                                                    @foreach($post->tags as $tag)
                                                                    <a href="{{route('blog.index', 'tag=' . $tag->id)}}">{{$tag->title}}</a>
                                                                    @endforeach
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="d-flex justify-content-center mt-4">
                                                <a href="{{route('blog.index', 'author=' . $user->id)}}" class="food-btn"><span>Все статьи</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </article>
                    </div>
                    <x-author-sidebar />
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Home Chef Section Ending Here -->
@endsection

@section('dopScripts')
    <script src="{{asset('assets/front/js/tab.js')}}"></script>
@endsection
