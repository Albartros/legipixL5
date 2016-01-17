@extends('layout.layout')

@section('title', trans('forum.pageTitle'))

@section('content')
    <header class="header">
        <img src="{!! asset('img/temporary/banner.jpg') !!}" alt="forum-banner" class="header__background">
        <nav class="breadcrumb">
            <span class="breadcrumb__item">{!! trans('forum.forum') !!}</span>
        </nav>
        <h1 class="header__tag">{!! trans('forum.forum') !!}</h1>
    </header>

    <div class="forumBar">
        <div class="forumBar__actions">
            <a class="button forumBar__actions__link" href="#">
                <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path class="button__icon__path" d="M810 554h-256v256h-84v-256h-256v-84h256v-256h84v256h256v84z"></path>
                </svg>
                {!! trans('general.new') !!}
            </a>
            <button class="button button--grey forumBar__actions__link" onClick="window.location.reload()">
                <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path class="button__icon__path" d="M754 270l100-100v300h-300l138-138q-76-76-180-76-106 0-181 75t-75 181 75 181 181 75q84 0 150-47t92-123h88q-28 112-120 184t-210 72q-140 0-240-100t-100-242 100-242 240-100q142 0 242 100z"></path>
                </svg>
                {!! trans('general.reload') !!}
            </button>
        </div>
        <div class="forumBar__filters">
            <strong class="forumBar__filters__name">{!! trans('forum.filterBy') !!} :</strong>
            <a href="#" class="forumBar__filter forumBar__filter--active">{!! trans('forum.filterClassic') !!}</a>
            <a href="#" class="forumBar__filter disabled">{!! trans('forum.filterPopular') !!}</a>
            <strong class="forumBar__filters__name">{!! trans('forum.showBy') !!} :</strong>
            <a href="#" class="forumBar__filter disabled">{!! trans('forum.showAll') !!}</a>
            <a href="#" class="forumBar__filter forumBar__filter--active">{!! trans('forum.showOfficial') !!}</a>
            <a href="#" class="forumBar__filter disabled">{!! trans('forum.showUnofficial') !!}</a>
            <strong class="forumBar__filters__name">{!! trans('forum.showActives') !!} :</strong>
            <input class="switch" type="checkbox" id="showActive">
            <label for="showActive"></label>
        </div>
    </div>
    <div class="forumContainer">
        @include('forum.followedTags')
        @if($isClassicDisplay == true)
            @foreach($categories as $category)
                <div class="forum__container">
                    <h2 class="forum__category">{{ $category->name }}</h2>
                    @foreach ($category->tags as $tag)
                        @if($tag->is_official)
                            <a class="forum" href="{!! route('forum.getTag', [e($tag->slug)]) !!}">
                                <h2 class="forum__title">{{ $tag->name }}</h2>
                                <p class="forum__description">{{ $tag->content }}</p>
                            </a>
                        @else
                            <a class="forum forum--unofficial" href="{!! route('forum.getTag', [e($tag->slug)]) !!}">
                                <h2 class="forum__title">{{ $tag->name }}</h2>
                                <dl class="forum__counter">
                                    <dd class="forum__counter__icon">
                                        <svg class="forum__counter__icon__icon" version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                                        </svg>
                                    </dd>
                                    <dt class="forum__counter__value">{{ $tag->topics->count() }}</dt>
                                </dl>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="forum__container">
                @foreach ($tags as $tag)
                    @if($tag->is_official)
                        <a class="forum" href="{!! route('forum.getTag', [e($tag->slug)]) !!}">
                            <h2 class="forum__title">{{ $tag->name }}</h2>
                            <p class="forum__description">{{ $tag->content }}</p>
                        </a>
                    @else
                        <a class="forum forum--unofficial" href="{!! route('forum.getTag', [e($tag->slug)]) !!}">
                            <h2 class="forum__title">{{ $tag->name }}</h2>
                            <dl class="forum__counter">
                                <dd class="forum__counter__icon">
                                    <svg class="forum__counter__icon__icon" version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                                    </svg>
                                </dd>
                                <dt class="forum__counter__value">{{ $tag->topics->count() }}</dt>
                            </dl>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    @parent
@endsection