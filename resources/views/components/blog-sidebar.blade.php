<div class="col-lg-4 col-md-7 col-12">
    <aside>
        <div class="widget widget-search">
            <div class="search-wrapper">
                <form action="{{route('blog.index')}}" method="get">
                    <input id="square" type="text" name="search" placeholder="Поиск...">
                    <button type="submit"><i class="icofont-search-2"></i></button>
                </form>
            </div>
        </div>

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
        @if($cats)
        <div class="widget widget-category">
            <div class="widget-header">
                <h5>Категории статей</h5>
            </div>
            <ul class="widget-wrapper">
                @foreach($cats as $category)
                    <li>
                        <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>{{$category->title}}</span><span>{{$category->posts->count()}}</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif

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

        @if($archives->count())
        <div class="widget widget-archive">
            <div class="widget-header">
                <h5>Архив статей</h5>
            </div>
            <ul class="widget-wrapper">
                @foreach($archives as $archive)
                <li><a href="{{route('blog.index', 'month=' . \Carbon\Carbon::parse($archive->month)->translatedFormat('m') . '&year=' . $archive->year)}}" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>{{Illuminate\Support\Str::ucfirst(\Carbon\Carbon::parse($archive->month)->translatedFormat('F'))}}</span><span>{{$archive->year}}</span></a> </li>
{{--                <li><a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>August</span><span>2013</span></a></li>--}}
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
                <li><a href="#">{{$tag->title}}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    </aside>
</div>
