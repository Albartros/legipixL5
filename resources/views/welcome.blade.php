@extends('layout.layout')

@section('title', trans('landingPage.pageTitle'))

@section('content')
    <div class="splash">
        <h1 class="splash__title">{!! trans('landingPage.catchPhrase') !!}</h1>

        <h2 class="splash__subTitle">{!! trans('landingPage.subCatchPhrase') !!}</h2>
        <a class="button button--splash" href="#" rel="prefetch">{!! trans('landingPage.splashButton') !!}</a>
    </div>
    <!--<div class="landingFeatures">
        <div class="landingFeatures__column">
            <h2 class="landingFeatures__column__name">{!! trans('landingPage.forumPromo') !!}</h2>

            <h3 class="landingFeatures__column__subName">{!! trans('landingPage.forumSubPromo') !!}</h3>
        </div>
        <div class="landingFeatures__column">
            <h2 class="landingFeatures__column__name">{!! trans('landingPage.gamingPromo') !!}</h2>

            <h3 class="landingFeatures__column__subName">{!! trans('landingPage.gamingSubPromo') !!}</h3>
        </div>
        <div class="landingFeatures__column">
            <h2 class="landingFeatures__column__name">{!! trans('landingPage.communityPromo') !!}</h2>

            <h3 class="landingFeatures__column__subName">{!! trans('landingPage.communitySubPromo') !!}</h3>
        </div>
    </div>
    <div class="landingFeature">
        <h2 class="landingFeature__name">{!! trans('landingPage.HaloPromo') !!}
            <sup class="landingFeature__name__sup">&reg;</sup>
        </h2>

        <h3 class="landingFeature__subName">{!! trans('landingPage.HaloSubPromo') !!}</h3>
    </div>-->
@endsection

@section('scripts')
    @parent
@endsection