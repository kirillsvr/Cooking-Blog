<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png')}}" type="image/x-icon">
    <title>
        @hasSection('title')
            @yield('title') | {{config('app.name')}}
        @else
            {{config('app.name')}}
        @endif
    </title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/select2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/scrollbar.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('assets/admin/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/responsive.css')}}">

    @yield('dopStyles')

</head>
<body>
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('assets/admin/images/logo/logo.png')}}" alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
            </div>
            <div class="left-header col horizontal-wrapper ps-0"></div>
            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li>
                        <span class="header-search"><i data-feather="search"></i></span>
                    </li>
                    <li class="onhover-dropdown">
                        <x-admin-notitications />
                    </li>
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        <div class="media profile-media"><img class="b-r-10" src="{{asset('assets/admin/images/dashboard/profile.jpg')}}" alt="">
                            <div class="media-body"><span>{{auth()->user()->name}}</span>
                                <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="{{route('users.show', auth()->user()->id)}}"><i data-feather="user"></i><span>Аккаунт </span></a></li>
                            <li><a href="{{route('settings.edit')}}"><i data-feather="settings"></i><span>Настройки</span></a></li>
                            <li><a href="{{route('logout')}}"><i data-feather="log-in"> </i><span>Выход</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName"></div>
                    </div>
                </div>
            </script>
            <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
            <div>
                <div class="logo-wrapper"><a href="{{url('/')}}" target="_blank"><img class="img-fluid for-light" src="{{asset('assets/admin/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/admin/images/logo/logo_dark.png')}}" alt=""></a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
                </div>
                <div class="logo-icon-wrapper"><a href="{{url('/')}}" target="_blank"><img class="img-fluid" src="{{asset('assets/admin/images/logo/logo-icon.png')}}" alt=""></a></div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
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
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="file-text"></i><span>Статьи              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('posts.index')}}">Все статьи</a></li>
                                    <li><a href="{{route('posts.create')}}">Добавить статью</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>Рецепты</h6>
                                    <p>Раздел рецептов</p>
                                </div>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="list"></i><span>Категории рецептов              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('recipe_category.index')}}">Все категории</a></li>
                                    <li><a href="{{route('recipe_category.create')}}">Добавить категорию</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="book"></i><span>Рецепты              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('recipe.index')}}">Все рецепты</a></li>
                                    <li><a href="{{route('recipe.create')}}">Добавить рецепт</a></li>
                                </ul>
                            </li>
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title" href="#"><i data-feather="tag"></i><span>Тэги рецептов              </span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="{{route('recipe_tags.index')}}">Все тэги</a></li>
                                    <li><a href="{{route('recipe_tags.create')}}">Добавить тэг</a></li>
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
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </nav>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2021 © Cuba theme by pixelstrap  </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="{{asset('assets/admin/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/admin/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('assets/admin/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('assets/admin/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/admin/js/config.js')}}"></script>
<!-- Plugins JS start-->


<script src="{{asset('assets/admin/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/admin/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/admin/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/admin/js/tooltip-init.js')}}"></script>

@yield('dopScripts')
<script src="{{asset('assets/admin/js/script.js')}}"></script>
</body>
</html>
