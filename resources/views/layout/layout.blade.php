<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Legipix - @yield('title')</title>
    <meta charset="utf-8">

    <!-- Metas -->
    <meta content="IE=Edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Pace -->
    <script src="{!! asset('js/pace.min.js') !!}"></script>

    <!-- Styles -->
    <link href="{!! asset('css/main.css') !!}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100|Source+Sans+Pro:400,600" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="{!! asset('img/favicon/apple-icon-57x57.png') !!}">
    <link rel="apple-touch-icon" sizes="60x60" href="{!! asset('img/favicon/apple-icon-60x60.png') !!}">
    <link rel="apple-touch-icon" sizes="72x72" href="{!! asset('img/favicon/apple-icon-72x72.png') !!}">
    <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('img/favicon/apple-icon-76x76.png') !!}">
    <link rel="apple-touch-icon" sizes="114x114" href="{!! asset('img/favicon/apple-icon-114x114.png') !!}">
    <link rel="apple-touch-icon" sizes="120x120" href="{!! asset('img/favicon/apple-icon-120x120.png') !!}">
    <link rel="apple-touch-icon" sizes="144x144" href="{!! asset('img/favicon/apple-icon-144x144.png') !!}">
    <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('img/favicon/apple-icon-152x152.png') !!}">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('img//favicon/apple-icon-180x180.png') !!}">
    <link rel="icon" type="image/png" sizes="192x192" href="{!! asset('img//favicon/android-icon-192x192.png') !!}">
    <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('img/favicon/favicon-32x32.png') !!}">
    <link rel="icon" type="image/png" sizes="96x96" href="{!! asset('img/favicon/favicon-96x96.png') !!}">
    <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('img/favicon/favicon-16x16.png') !!}">
    <link rel="manifest" href="{!! asset('img/favicon/manifest.json') !!}">
    <meta name="msapplication-TileColor" content="#d1c4e9">
    <meta name="msapplication-TileImage" content="{!! asset('img/favicon/ms-icon-144x144.png') !!}">
    <meta name="theme-color" content="#d1c4e9">
</head>

<body class="body @if(isset($cristalPage) && $cristalPage == true) body--cristal @endif">

@if(\Illuminate\Support\Facades\Session::has('message'))
    <div class="flash">
        <div class="flash__message">{{ \Illuminate\Support\Facades\Session::pull('message') }}</div>
    </div>
@endif

<nav class="nav__container @if(isset($cristalPage) && $cristalPage == true) nav__container--cristal @endif">

    <div class="nav">
        <a class="nav__logo" href="{!! route('getHome') !!}">
            <img draggable="false" alt="logo" class="nav__logo__image" src="{!! asset('img/logo/logo.svg') !!}">
            <span class="nav__logo__name">LegiPix</span>
            <span class="nav__logo__dot">.net // dev</span>
        </a>
        <menu class="nav__menu">
            <li class="nav__menu__item">
                <a class="nav__menu__link" href="{!! route('getHome') !!}">Redactor.dev</a>
            </li>
            <li class="nav__menu__item">
                <a class="nav__menu__link" href="{!! route('getHome') !!}">User.dev</a>
            </li>
            <li class="nav__menu__item">
                <a class="nav__menu__link" href="{!! route('forum.getForum') !!}">{!! trans('menu.menuForumLink') !!}</a>
            </li>
            <li class="nav__menu__item">
                <a class="button" href="{!! route('user.getLogin') !!}">{!! trans('menu.menuLoginButton') !!}</a>
            </li>
        </menu>
    </div>
</nav>

@if(!isset($cristalPage))
    <div class="nav__spacer"></div>
@endif

<div class="mainWrapper">
    @section('content')
    @show
</div>

<footer class="footer">
    @if(!isset($cristalPage))
    <div class="footer__blocks">
        <div class="footer__block">
            <h2 class="footer__block__name">{!! trans('menu.footerAbout') !!}</h2>
            <p class="footer__block__text">{!! trans('menu.footerAboutText') !!}</p>
        </div>
        <div class="footer__block">
            <h2 class="footer__block__name">{!! trans('menu.footerContact') !!}</h2>

            <p class="footer__block__text">{!! trans('menu.footerContactText') !!}</p>
        </div>
        <div class="footer__block">
            <h2 class="footer__block__name">{!! trans('menu.footerContribute') !!}</h2>

            <p class="footer__block__text">{!! trans('menu.footerContributeText') !!}</p>
        </div>
    </div>
    @endif
    <div class="footer__copyright @if((isset($cristalPage) && $cristalPage == true) || (isset($errorPage) && $errorPage == true))
    footer__copyright--cristal @endif">
        {!! trans('menu.footerCopyright') !!} - 2014 - {!! date('Y') !!}
    </div>
</footer>

<div id="cookieBox" class="cookie">
    <div class="cookie__text">
        {!! trans('general.cookieMessage') !!}
        <button id="cookieButton" class="button button--cookie">OK</button>
    </div>
</div>

<script src="{!! asset('js/legipix.js') !!}"></script>
<script type="text/javascript">
    (function () {
        Global.init();
        @yield('scripts')
        Cookie.init();
        @show
    })();
</script>
</body>
</html>
