<div class="col-lg-4 col-md-7 col-12">
    <aside>
        <div class="widget widget-author">
            <div class="widget-header">
                <h5>Основатель проекта Mezplan</h5>
            </div>
            <div class="widget-wrapper">
                <div class="admin-thumb">
                    <img src="/uploads/{{$admin->image}}" alt="author">
                </div>
                <div class="admin-content">
                    <p>{{$admin->info}}</p>
                    <div class="scocial-media">
                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                        <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget recipe-categori">
            <div class="widget-header">
                <h5>Категории</h5>
            </div>
            <div class="widget-wrapper section-wrapper">
                <div class="row justify-content-center no-gutters">
                    @foreach($categories as $category)
                    <div class="col-6">
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

        @if($recipes->count())
            <div class="widget widget-post">
                <div class="widget-header">
                    <h5>Популярные рецепты</h5>
                </div>
                <ul class="widget-wrapper">
                    @foreach($recipes as $recipe)
                        <li class="d-flex flex-wrap justify-content-between">
                            <div class="post-thumb">
                                <a href="{{route('front.recipe.index', $recipe->slug)}}"><img src="/uploads/{{$recipe->thumbnail}}" alt="product"></a>
                            </div>
                            <div class="post-content">
                                <h6><a href="{{route('front.recipe.index', $recipe->slug)}}">{{$recipe->title}}</a></h6>
                                <p>{{$recipe->created_at->translatedFormat('d F Y')}}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($tags->count())
            <div class="widget widget-tags">
                <div class="widget-header">
                    <h5>Топ тэгов</h5>
                </div>
                <ul class="widget-wrapper">
                    @foreach($tags as $tag)
                        <li><a href="{{route('front.recipes.index', 'tag=' . $tag->id)}}">{{$tag->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </aside>
</div>
