<!DOCTYPE html>
<html lang="ru">

<head>
    <title>{{ env('APP_NAME') }} &mdash; Видеограф различных мероприятий!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.notify.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar site-navbar-target bg-white" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-lg-4">
                        <nav class="site-navigation text-right ml-auto " role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li @if (Route::currentRouteName() === 'welcome') class="active" @endif><a
                                        href="{{ route('welcome') }}" class="nav-link">Главная</a></li>
                                <li @if (Route::currentRouteName() === 'portfolio') class="active" @endif><a
                                        href="{{ route('portfolio') }}" class="nav-link">Портфолио</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="site-logo">
                            <a href="{{ route('welcome') }}">{{ env('APP_NAME') }}</a>
                        </div>

                        <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#"
                                class="site-menu-toggle py-5 js-menu-toggle text-white"><span
                                    class="icon-menu h3 text-primary"></span></a></div>
                    </div>
                    <div class="col-lg-5">
                        <nav class="site-navigation text-left mr-auto " role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                <li @if (Route::currentRouteName() === 'about') class="active" @endif><a
                                        href="{{ route('about') }}" class="nav-link">О нас</a></li>
                                <li @if (Route::currentRouteName() === 'contacts') class="active" @endif><a
                                        href="{{ route('contacts') }}" class="nav-link">Контакты</a></li>
                                @guest
                                    <li @if (Route::currentRouteName() === 'showLogin') class="active" @endif><a
                                            href="{{ route('showLogin') }}" class="nav-link">Войти</a></li>
                                @else
                                    <li @if (Route::currentRouteName() === 'profile') class="active" @endif><a
                                            href="{{ route('profile.index') }}" class="nav-link"><span
                                                class="icon-user px-3 d-none d-lg-inline"></span> <span
                                                class="d-inline d-lg-none">Профиль</span></a></li>
                                    <li><a href="{{ route('logout') }}" class="nav-link">Выйти</a></li>
                                @endguest
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>

        </header>
