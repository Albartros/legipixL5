@extends('layout.layout')

@section('title', trans('landingPage.pageTitle'))

@section('content')
        <!--suppress ALL -->
    <div class="splash">
        <h1 class="splash__title">{!! trans('landingPage.catchPhrase') !!}</h1>
        <h2 class="splash__subTitle">{!! trans('landingPage.catchPhraseMore') !!}</h2>
        <img class="splash__controller" src="{{ asset('img/misc/pad.png') }}" alt="controller" usemap="#konami">
        <map name="konami">
            <area class="konami-button" coords="230,80,11" data-button="a" shape="circ"></area>
            <area class="konami-button" coords="250,60,11" data-button="b" shape="circ"></area>
            <area class="konami-button" coords="103,118,118,133" data-button="down" shape="rect"></area>
            <area class="konami-button" coords="88,103,103,118" data-button="left" shape="rect"></area>
            <area class="konami-button" coords="118,103,133,118" data-button="right" shape="rect"></area>
            <area class="konami-button" coords="103,88,118,103" data-button="up" shape="rect"></area>
        </map>
        <a class="button button--splash" href="{!! route('user.register') !!}">{!! trans('landingPage.splashButton') !!}</a>
    </div>
    <div class="landingFeature">
        <h2 class="landingFeature__name">{!! trans('landingPage.promoHalo') !!}</h2>
        <div class="landingFeature__subName">{!! Markdown::convertToHtml(trans('landingPage.promoHaloText')) !!}</div>
    </div>
    <div class="landingFeatures">
        <div class="landingFeatures__column">
            <h2 class="landingFeatures__column__name">{!! trans('landingPage.promoForum') !!}</h2>
            <h3 class="landingFeatures__column__subName">{!! trans('landingPage.promoForumText') !!}</h3>
        </div>
        <div class="landingFeatures__column">
            <h2 class="landingFeatures__column__name">{!! trans('landingPage.promoGaming') !!}</h2>
            <h3 class="landingFeatures__column__subName">{!! trans('landingPage.promoGamingText') !!}</h3>
        </div>
        <div class="landingFeatures__column">
            <h2 class="landingFeatures__column__name">{!! trans('landingPage.promoCommunity') !!}</h2>
            <h3 class="landingFeatures__column__subName">{!! trans('landingPage.promoCommunityText') !!}</h3>
        </div>
    </div>
    <div class="featuredUsers">
        <h1 class="featuredUsers__title">{!! trans('landingPage.featuredUsers') !!}&#42;</h1>
        <h2 class="featuredUsers__more">{!! trans('landingPage.featuredUsersText') !!}</h2>
        <div class="featuredUsers__blocks">
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIFXxmxGDtE9Vkd62rOpb7JYs2u1RFCJCNAO.uOKjzbKIuccfoUCeh3M2i8uGXe3_F&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">
                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Albartros98</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIbgsfD63mXFU_1J9M4K4P9JlD1k.UfUzddEoS7yMLhGXCGNoSGMT22HhEnFNIpxJQ&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">
                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Molant</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIFXxmxGDtE9Vkd62rOpb7JYAz_gVXlqDA5qG2rJ1GSMgkSwRq3mqS_IGa5UdgZ4E0&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Jacky1593</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIFXxmxGDtE9Vkd62rOpb7JehA8dSapBHnH1CYJpGcvrqx3u3aQ5NMCKRX1WaLAVwB&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Adridu60</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIbgsfD63mXFU_1J9M4K4P9HQtw3uIry.B8DMfot7DZjYtGa47znlLH.bOWPjlzjr8&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Mugen153</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIFXxmxGDtE9Vkd62rOpb7JT.9X3JxQanGPSVZUnDOoIFsFStL3qiTTRpSNmYdezVy&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Ixere</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIFXxmxGDtE9Vkd62rOpb7JXOjBD9G2Ei4YyB95G.AFXhX1EfzUEAJ7o8zwnjYKrUp&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Aedlium25</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIm2RQQtfSX9jMSatOYowOzFGrmXRC0uhY67.hdTPTY6qmHE5qXdhV4CSdn79W3yys&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Hunt3r08</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIbgsfD63mXFU_1J9M4K4P9PsE4xEhRWlaP0IP_EwihswMrKL3hcrLUZUW7l57ob98&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Majymer</h5>
                </div>
            </a>
            <a href="#" class="featuredUsers__block">
                <img src="https://images-eds-ssl.xboxlive.com/image?url=z951ykn43p4FqWbbFvR2Ec.8vbDhj8G2Xe7JngaTToBrrCmIEEXHC9UNrdJ6P7KIm2RQQtfSX9jMSatOYowOzK3uXntZA0pA8N7M4ys4.GjIjIPNEM6RiNprgPP7_5DQ&format=png&h=300&w=300"
                     alt="avatar" class="featuredUsers__block__avatar">

                <div class="featuredUsers__block__mask">
                    <h5 class="featuredUsers__block__title">Seb et Raf</h5>
                </div>
            </a>
        </div>
        <p class="featuredUsers__info">&#42; {!! trans('landingPage.featuredUsersSub') !!}</p>
    </div>
@endsection

@section('scripts')
    Konami.init();
    Background.init();
    @parent
@endsection