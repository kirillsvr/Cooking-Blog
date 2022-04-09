<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/front/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/icofont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/sweetalert2.css')}}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/front/css/rating.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/easy-autocomplete.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">


    <title>Mezban Home-4</title>
</head>

<body>
<!-- preloader -->
<div class="preloader"><div class="load loade"><hr/><hr/><hr/><hr/></div></div>
<!-- preloader -->

<!-- search area -->
<div class="search-area">
    <div class="search-input">
        <div class="search-close">
            <span></span>
            <span></span>
        </div>
        <form>
            <input type="text" name="text" placeholder="*Поиск.......">
        </form>
    </div>
</div>
<!-- search area -->

<!-- Mobile Menu Start Here -->
<div class="mobile-menu">
    <nav class="mobile-header d-xl-none">
        <div class="header-logo">
            <a href="/" class="logo"><img src="/assets/front/images/logo/01.png" alt="logo"></a>
        </div>
        <div class="header-bar">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <nav class="menu">
        <div class="mobile-menu-area d-xl-none">
            <div class="mobile-menu-area-inner" id="scrollbar">
                <x-front-mobile-menu />
                <div class="scocial-media">
                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Mobile Menu Ending Here -->

<!-- header section start -->
<header class="header-section header-3 d-xl-block d-none">
    <div class="container">
        <div class="">
            <div class="header-top w-100">
                <div class="logo">
                    <a href="/"><img src="/assets/front/images/logo/01.png" alt="logo"></a>
                </div>
                <x-front-menu />
                <div class="scocial-media">
                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                </div>
            </div>
            <div class="header-bottom w-100">
                <div class="main-menu">
                    <x-category-menu />
                </div>
                <div class="author-option d-flex justify-content-end">
                    @guest
                    <div class="author-area">
                        <div class="author-account">
                            <ul>
                                <li>
                                    <a href="{{route('login')}}">Вход</a>
                                </li>
                                <li>
                                    /
                                </li>
                                <li>
                                    <a href="{{route('register.create')}}">Регистрация</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endguest

                    @auth
                        <div class="author-area">
                            <div class="author-account">
                                @if(!is_null(auth()->user()->image))
                                <div class="author-icon" style="margin-right: 8px">
                                    <img src="/uploads/{{auth()->user()->image}}" alt="author">
                                </div>
                                @endif
                                <ul>
                                    <li style="margin-right: 20px">
                                        {{auth()->user()->name}}
                                    </li>
                                @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 3)
                                    <li>
                                        <a href="/admin">Админ. панель</a>
                                    </li>
                                @endif
                                    <li>
                                        <a href="{{route('logout')}}">Выход</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header section ending -->

@yield('banner')

@yield('content')

<!-- Footer Section Start Here -->
<footer class="footer">
    <div class="bg-shape-style"></div>
    <div class="container">
        <div class="footer-top">
            <div class="footer-area text-center">
                <div class="footer-logo">
                    <a href="/"><img src="/assets/front/images/header/footer/01.png" alt="footer-logo"></a>
                </div>
                <div class="scocial-media">
                    <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                    <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li><a href="/about">О нас</a></li>
                        <li><a href="/recipes">Рецепты</a></li>
                        <li><a href="/blog">Блог</a></li>
                        <li><a href="/authors">Авторы</a></li>
                        <li><a href="/contact">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p>&copy; 2022</p>
        </div>
    </div>
</footer>
<!-- Footer Section Ending Here -->


<!-- scrollToTop start here -->
<a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i></a>
<!-- scrollToTop ending here -->



<script src="{{asset('assets/front/js/jquery.js')}}"></script>
<script src="{{asset('assets/front/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/js/wow.min.js')}}"></script>
@yield('dopScripts')
<script src="{{asset('assets/front/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/front/js/lightcase.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.easy-autocomplete.min.js')}}"></script>
<script src="{{asset('assets/front/js/functions.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.barrating.js')}}"></script>
<script src="{{asset('assets/front/js/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/front/js/script.js')}}"></script>
</body>
</html>
