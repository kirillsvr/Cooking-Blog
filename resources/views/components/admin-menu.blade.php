<ul class="sidebar-links" id="simple-bar">
    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('assets/admin/images/logo/logo-icon.png')}}" alt=""></a>
        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
    </li>
    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('admin.index')}}"><i data-feather="home"> </i><span>Главная</span></a></li>
    @can('edit', \App\Models\Setting::class)
        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('settings.edit')}}"><i data-feather="settings"> </i><span>Настройки сайта</span></a></li>
    @endcan
    <li class="sidebar-main-title">
        <div>
            <h6>Блог</h6>
            <p>Раздел блога</p>
        </div>
    </li>
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#"><i data-feather="file-text"></i><span>Статьи              </span></a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('posts.index')}}">Все статьи</a></li>
            <li><a href="{{route('posts.create')}}">Добавить статью</a></li>
        </ul>
    </li>
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#"><i data-feather="list"></i><span>Категории              </span></a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('categories.index')}}">Все категории</a></li>
            <li><a href="{{route('categories.create')}}">Добавить категорию</a></li>
        </ul>
    </li>
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#"><i data-feather="tag"></i><span>Тэги              </span></a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('tags.index')}}">Все тэги</a></li>
            <li><a href="{{route('tags.create')}}">Добавить тэг</a></li>
        </ul>
    </li>
    <li class="sidebar-main-title">
        <div>
            <h6>Рецепты</h6>
            <p>Раздел рецептов</p>
        </div>
    </li>
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#"><i data-feather="book"></i><span>Рецепты              </span></a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('recipe.index')}}">Все рецепты</a></li>
            <li><a href="{{route('recipe.create')}}">Добавить рецепт</a></li>
        </ul>
    </li>
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#"><i data-feather="list"></i><span>Категории рецептов              </span></a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('recipe_category.index')}}">Все категории</a></li>
            <li><a href="{{route('recipe_category.create')}}">Добавить категорию</a></li>
        </ul>
    </li>
    <li class="sidebar-list">
        <a class="sidebar-link sidebar-title" href="#"><i data-feather="tag"></i><span>Рубрики рецептов              </span></a>
        <ul class="sidebar-submenu">
            <li><a href="{{route('recipe_tags.index')}}">Все рубрики</a></li>
            <li><a href="{{route('recipe_tags.create')}}">Добавить рубрику</a></li>
        </ul>
    </li>
    @can('viewAny', \App\Models\User::class)
        <li class="sidebar-main-title">
            <div>
                <h6>Страницы сайта</h6>
                <p>Раздел пользователей</p>
            </div>
        </li>
        <li class="sidebar-list">
        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('about.edit')}}"><i data-feather="briefcase"> </i><span>О нас</span></a></li>
        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{route('contact.edit')}}"><i data-feather="phone"> </i><span>Контакты</span></a></li>
        </li>

        <li class="sidebar-main-title">
            <div>
                <h6>Пользователи</h6>
                <p>Раздел пользователей</p>
            </div>
        </li>
        <li class="sidebar-list">
            <a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Пользователи              </span></a>
            <ul class="sidebar-submenu">
                <li><a href="{{route('users.index')}}">Все пользователи</a></li>
                <li><a href="{{route('users.create')}}">Добавить пользователя</a></li>
            </ul>
        </li>
    @endcan
    {{--                            <li class="sidebar-list">--}}
    {{--                                <label class="badge badge-success">2</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Dashboard              </span></a>--}}
    {{--                                <ul class="sidebar-submenu">--}}
    {{--                                    <li><a class="lan-4" href="index.html">Default</a></li>--}}
    {{--                                    <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>--}}
    {{--                                </ul>--}}
    {{--                            </li>--}}
</ul>
