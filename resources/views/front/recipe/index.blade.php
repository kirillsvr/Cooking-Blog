@extends('front.layouts.layout')


@section('content')
    <x-front-title
        header="Рецепты"
        breadcrumb="front.breadcrumb"
        paramBreadcrumb="Рецепты"
    />

    <!-- Shop Page Section Start Here -->
    <div class="shop-page single padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <article>
                            @if($recipes->count())
                            <div class="shop-title d-flex flex-wrap justify-content-between">
                                <p>С {{$recipes->firstItem()}} по {{$recipes->lastItem()}} рецепт из {{$recipes->total()}}</p>
                            </div>

                            <div class="shop-product-wrap grid row">
                                @foreach($recipes as $recipe)
                                    <div class="col-xl-6 col-md-6 col-12">
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
                            @else
                                <p>Рецептов не найдено</p>
                            @endif

                            {{$recipes->withQueryString()->links('vendor.pagination.front')}}
                        </article>
                    </div>
                    <x-recipe-sidebar />
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page Section Ending Here -->
@endsection
