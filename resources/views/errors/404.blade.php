<?php $errorPage = true; ?>
@extends('layout.layout')

@section('title', trans('error.404PageTitle'))

@section('content')
    <div class="errorContainer">
        <div class="error">
            <h1 class="error__title">{!! trans('error.404Title') !!}</h1>

            <h2 class="error__subTitle withEmoji">{!! trans('error.404Text') !!}</h2>
            <a class="button button--splash button--error" href="{!! route('getHome') !!}"
               rel="prefetch">{!! trans('error.404Button') !!}</a>
        </div>
    </div>
@endsection

<script src="//cdn.jsdelivr.net/emojione/2.0.0/lib/js/emojione.min.js"></script>
@section('scripts')
    @parent
    Emoji.init();
@endsection