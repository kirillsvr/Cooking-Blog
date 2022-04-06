@extends('front.layouts.layout')

@section('content')
    <x-front-title
        header="{{$recipe->title}}"
        breadcrumb="front.recipe"
        paramBreadcrumb="{{$recipe->slug}}"
    />

    <div class="blog-section blog-single recepi-single padding-tb bg-body">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <article>
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-thumb">
                                        <div class="image-recipe">
                                            <img src="/uploads/{{$recipe->thumbnail}}" alt="shop-single">
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="meta-tag">
                                            <div class="categori">
                                                <a href="#">{{$recipe->recipeCategory->title}}</a>
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
                                        <h4>{{$recipe->title}}</h4>
                                        <div class="meta-post">
                                            <ul>
                                                <li>
                                                    <i class="icofont-ui-user"></i>
                                                    <a href="{{route('authors.show', $recipe->user->id)}}" class="admin">{{$recipe->user->name}}</a>
                                                </li>
                                                <li>
                                                    <i class="icofont-clock-time"></i>
                                                    <span>Подготовка : {{$recipe->prep_time}} мин.</span>
                                                </li>
                                                <li>
                                                    <i class="icofont-clock-time"></i>
                                                    <span>Время приготовления : {{$recipe->cook_time}} мин. </span>
                                                </li>
                                                <li>
                                                    <i class="icofont-signal"></i>
                                                    <a href="{{route('front.recipes.index', 'level=' . $recipe->level->id)}}"><span>Уровень навыка : {{$recipe->level->name}}</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        @if(!empty($recipe->content))
                                        <p>{!! $recipe->content !!}</p>
                                        @endif
                                        <div class="make-product">
                                            @if($recipe->recipeIngredients->count())
                                            <div class="left">
                                                <div class="title">
                                                    <h6>Ингредиенты</h6>
                                                </div>
                                                <ul>
                                                    @foreach($recipe->recipeIngredients as $ingredient)
                                                    <li class="active">{{$ingredient->title}} @if(isset($ingredient->quantity))- {{$ingredient->quantity}}@endif</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <div class="right">
                                                <div class="title">
                                                    <h6>Пищевая ценность</h6>
                                                </div>
                                                <ul>
                                                    <li>
                                                                <span class="left">
                                                                    <i class="icofont-double-right"></i>Калорийность
                                                                </span>
                                                        <span class="right">{{$recipe->caloric}}</span>
                                                    </li>
                                                    <li>
                                                                <span class="left">
                                                                    <i class="icofont-double-right"></i>Белки
                                                                </span>
                                                        <span class="right">{{$recipe->protein}}</span>
                                                    </li>
                                                    <li>
                                                                <span class="left">
                                                                    <i class="icofont-double-right"></i>Жиры
                                                                </span>
                                                        <span class="right">{{$recipe->fat}}</span>
                                                    </li>
                                                    <li>
                                                                <span class="left">
                                                                    <i class="icofont-double-right"></i>Углеводы
                                                                </span>
                                                        <span class="right">{{$recipe->carbohydrates}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if($recipe->recipeSteps->count())
                                        <div class="step-mathod">
                                            <div class="title">
                                                <h6>Рецепт приготовления по шагам</h6>
                                            </div>
                                            <div class="step-wrapper">
                                                @foreach($recipe->recipeSteps as $step)
                                                <div class="step-item">
                                                    <div class="step-inner">
                                                        <div class="step-thumb">
                                                            <img src="/uploads/{{$step->image}}" alt="food-recipe">
                                                        </div>
                                                        <div class="step-content">
                                                            <h6>{{$step->step}}</h6>
                                                            <p>{{$step->info}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        <div class="tags-section">
                                            <ul class="tags">
                                                @foreach($recipe->recipeTags as $tag)
                                                <li><a href="#">{{$tag->title}}</a></li>
                                                @endforeach
                                            </ul>
                                            <div class="scocial-media">
                                                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                                <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="authors">
                                @if($recipe->user->image)
                                <div class="author-thumb">
                                    <a href="#"><img src="/uploads/{{$recipe->user->image}}" alt="author"></a>
                                </div>
                                @endif
                                <div class="author-content">
                                    <h6>{{$recipe->user->name}}</h6>
                                    <p>{{$recipe->user->info}}</p>
                                    <div class="scocial-media">
                                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                        <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                    </div>
                                </div>
                            </div>
                            @if($related->count())
                            <div class="product">
                                <h4 class="title-border">Похожие рецепты</h4>
                                <div class="section-wrapper">
                                    <div class="row no-gutters">
                                        @foreach($related as $value)
                                        <div class="col-xl-3 col-md-6 col-12">
                                            <div class="product-item">
                                                <div class="product-thumb">
                                                    <img src="/uploads/{{$value->thumbnail}}" alt="food-product">
                                                </div>
                                                <div class="product-content">
                                                    <h6><a href="{{route('front.recipe.index', $value->id)}}">{{$value->title}}</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(!empty($comments))
                            <div id="comments" class="comments">
                                <h4 class="title-border">{{\Drandin\DeclensionNouns\Facades\DeclensionNoun::make($recipe->recipeComments->where('is_published', 1)->count(), 'комментарий')}}</h4>
                                <?php function renderComments($comments){?>
                                    <ul class="comment-list">
                                    <?php foreach($comments as $value):?>
                                        <li class="comment">
                                            <div class="com-content">
                                                <div class="com-title">
                                                    <div class="com-title-meta">
                                                        <h6><a href="http://Sk" rel="external nofollow" class="url"><?=$value['name'];?></a></h6>
                                                        <span> <?=\Carbon\Carbon::parse($value['created_at'])->format('d.m.Y');?> </span>
                                                    </div>
                                                    <span class="reply">
                                                        <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Masum" data-id="{{$value['id']}}" data-name="{{$value['name']}}"><i class="icofont-reply-all"></i>Ответить</a>
                                                    </span>
                                                </div>
                                                <p><?=$value['comment'];?></p>
                                                <div class="reply-btn"></div>
                                            </div>
                                            <?php if (isset($value['childs'])):?>
                                                <?php renderComments($value['childs']);?>
                                            <?php endif;?>
                                        </li>
                                    <?php endforeach;?>
                                    </ul>
                                <?php };?>

                                <?php renderComments($comments);?>
                            </div>
                            @endif
                            <div id="respond" class="comment-respond">
                                <div class="respond-title">
                                    <h4 class="title-border" id="title-comments-form">Оставить комментарий</h4>
                                </div>
                                <div class="add-comment">
                                    <form action="{{route('recipe_comments.store', $recipe->id)}}" method="post" class="comment-form">
                                        @guest
                                        <input name="name" type="text" placeholder="Имя">
                                        <input name="email" type="text" placeholder="Email">
                                        @endguest
                                        <input name="parent" type="hidden" value="">
                                        <textarea id="comment-reply" name="comment" rows="5" placeholder="Напишите здесь ваш комментарий"></textarea>
                                        @csrf
                                        <button type="submit" class="food-btn"><span>Отправить комментарий</span></button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                    <x-recipe-sidebar />
                </div>
            </div>
        </div>
    </div>
@endsection
