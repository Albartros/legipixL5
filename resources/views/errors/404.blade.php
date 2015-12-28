<?php $cristal = false ?>
@extends('layout.layout')

@section('title', trans('general.errorPageNotFound'))

@section('content')
    <div class="errorContainer">
        <div class="error">
            <h1 class="error__title">{!! trans('general.errorPageNotFoundTitle') !!}</h1>

            <h2 class="error__subTitle">{!! trans('general.errorPageNotFoundText') !!}</h2>
            <a class="button button--splash" href="{!! route('index') !!}"
               rel="prefetch">{!! trans('general.errorPageNotFoundButton') !!}</a>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection