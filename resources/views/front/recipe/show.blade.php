@extends('front.layouts.layout')

@section('content')
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
{{--                                    <div id="demo" class="carousel slide vert">--}}
{{--                                        <div class="carousel-inner">--}}
{{--                                            <div class="carousel-item active">--}}
{{--                                                <div class="sli-recepi-thumb">--}}
{{--                                                    <img src="/assets/front/images//shop/single/01.jpg" alt="shop-single">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="carousel-item">--}}
{{--                                                <div class="sli-recepi-thumb">--}}
{{--                                                    <img src="/assets/front/images//shop/single/02.jpg" alt="shop-single">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="carousel-item">--}}
{{--                                                <div class="sli-recepi-thumb">--}}
{{--                                                    <img src="/assets/front/images//shop/single/03.jpg" alt="shop-single">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="carousel-item">--}}
{{--                                                <div class="sli-recepi-thumb">--}}
{{--                                                    <img src="/assets/front/images//shop/single/04.jpg" alt="shop-single">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="carousel-indicators">--}}
{{--                                            <div data-target="#demo" data-slide-to="0" class="item active">--}}
{{--                                                <img src="/assets/front/images//shop/single/01.jpg" alt="shop-single">--}}
{{--                                            </div>--}}
{{--                                            <div data-target="#demo" data-slide-to="1" class="item">--}}
{{--                                                <img src="/assets/front/images//shop/single/02.jpg" alt="shop-single">--}}
{{--                                            </div>--}}
{{--                                            <div data-target="#demo" data-slide-to="2" class="item">--}}
{{--                                                <img src="/assets/front/images//shop/single/03.jpg" alt="shop-single">--}}
{{--                                            </div>--}}
{{--                                            <div data-target="#demo" data-slide-to="3" class="item">--}}
{{--                                                <img src="/assets/front/images//shop/single/04.jpg" alt="shop-single">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="post-content">
                                    <div class="meta-tag">
                                        <div class="categori">
                                            <a href="#">{{$category->title}}</a>
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
                                    <h4>{{$recipe->title}}</h4>
                                    <div class="meta-post">
                                        <ul>
                                            <li>
                                                <i class="icofont-ui-user"></i>
                                                <a href="#" class="admin">Serves : 02</a>
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i>
                                                <a href="#" class="date">Подготовка : {{$recipe->prep_time}} min</a>
                                            </li>
                                            <li>
                                                <i class="icofont-clock-time"></i>
                                                <a href="#" class="date">Время приготовления : {{$recipe->cook_time}} min </a>
                                            </li>
                                            <li>
                                                <i class="icofont-signal"></i>
                                                <a href="#" class="skill">Уровень навыка : {{$recipe->skill_level}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @if(!empty($recipe->content))
                                    <p>{{$recipe->content}}</p>
                                    @endif
                                    <div class="make-product">
                                        <div class="left">
                                            <div class="title">
                                                <h6>Ingredients</h6>
                                            </div>
                                            <ul>
                                                @foreach($ingredients as $ingredient)
                                                <li class="active">{{$ingredient->title}} - {{$ingredient->quantity}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="right">
                                            <div class="title">
                                                <h6>Ингредиенты</h6>
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
                                    <div class="scan-area">
                                        <div class="title">
                                            <h6>Scan Your Shopping List</h6>
                                        </div>
                                        <div class="scrn-thumb">
                                            <img src="/assets/front/images//food-recipe/single/01.png" alt="food-recipe">
                                        </div>
                                    </div>
                                    <div class="step-mathod">
                                        <div class="title">
                                            <h6>Step By Step Method</h6>
                                        </div>
                                        <div class="step-wrapper">
                                            @foreach($steps as $step)
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
                                    <div class="tags-section">
                                        <ul class="tags">
                                            <li><a href="#">Agency</a></li>
                                            <li><a href="#">Business</a></li>
                                            <li><a href="#">Personal</a></li>
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
                            <div class="author-thumb">
                                <a href="#"><img src="/assets/front/images//chef/author/01.png" alt="author"></a>
                            </div>
                            <div class="author-content">
                                <h6>FoxCoders</h6>
                                <p>Data release Friday large ponted to better than expcted pickup in the euroz yieldsrose tolate Thursd and the euro edged up slghtly toY after the Grman recent political uncertainty in Germany has so far</p>
                                <div class="scocial-media">
                                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                    <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="product">
                            <h4 class="title-border">Related Recipes</h4>
                            <div class="section-wrapper">
                                <div class="row no-gutters">
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="/assets/front/images//food-recipe/01.jpg" alt="food-product">
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="/assets/front/images//food-recipe/02.jpg" alt="food-product">
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="/assets/front/images//food-recipe/03.jpg" alt="food-product">
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-12">
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <img src="/assets/front/images//food-recipe/02.jpg" alt="food-product">
                                            </div>
                                            <div class="product-content">
                                                <h6><a href="#">How To Cooking Roast Beef</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="comments" class="comments">
                            <h4 class="title-border">02 Comments</h4>
                            @if(!empty($comments))

                            <?php function renderComments($comments){?>
                                <ul class="comment-list">
                                <?php foreach($comments as $value):?>
                                    <li class="comment">
                                        <div class="com-content">
                                            <div class="com-title">
                                                <div class="com-title-meta">
                                                    <h6><a href="http://Sk" rel="external nofollow" class="url"><?=$value['name'];?></a></h6>
                                                    <span> <?=$value['updated_at'];?> </span>
                                                </div>
                                                <span class="reply">
                                                    <a rel="nofollow" class="comment-reply-link" href="#" aria-label="Reply to Masum"><i class="icofont-reply-all"></i>Reply</a>
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

                            @else
                            Комментариев пока нет...
                            @endif
                        </div>

                        <div class="comment-respond">
                            <h4 class="title-border">Leave a Comment</h4>
                            <div class="add-comment">
                                <form action="/" class="comment-form">
                                    <input name="name" type="text" placeholder="Name">
                                    <input name="email" type="text" placeholder="Email">
                                    <textarea id="comment-reply" name="comment" rows="5" placeholder="Type Here Your Comment"></textarea>
                                    <button type="submit" class="food-btn"><span>send comment</span></button>
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
