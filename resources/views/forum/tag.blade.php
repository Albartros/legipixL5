@extends('layout.layout')

@section('title', 'Tag - ' . trans('forum.pageTitleBase'))

@section('content')
    <header class="header">
        <img src="{!! asset('img/temporary/banner.jpg') !!}" alt="forum-banner" class="header__background">
        <nav class="breadcrumb">
            <a class="breadcrumb__link" href="{!! route('forum') !!}">{!! trans('forum.forum') !!}</a><span
                    class="breadcrumb__spacer">//</span><span class="breadcrumb__item">Tag</span>
        </nav>
        <h1 class="header__tag header__tag--unofficial">Tag</h1>
    </header>

    <div class="forumBar">
        <div class="forumBar__actions">
            <a class="button forumBar__actions__link" href="#">
                <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path class="button__icon__path"
                          d="M810 554h-256v256h-84v-256h-256v-84h256v-256h84v256h256v84z"></path>
                </svg>
                {!! trans('general.new') !!}
            </a>
            @if(Auth::check())
                <button id="followTag" data-tag="Tag" class="button button--grey forumBar__actions__link">
                    <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="button__icon__path"
                              d="M512 658l160 96-42-182 142-124-188-16-72-172-72 172-188 16 142 124-42 182zM938 394l-232 202 70 300-264-160-264 160 70-300-232-202 306-26 120-282 120 282z"></path>
                        <path id="followedPath" style="display: none;" class="button__icon__path"
                              d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg>
                    <span id="followTagText">{!! trans('forum.followTag') !!}</span><span style="display: none" id="followedTagText">{!! trans('forum.followedTag') !!}</span> #TAG
                </button>
            @else
                <a class="button button--grey forumBar__actions__link" href="#">
                    <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="button__icon__path"
                              d="M512 658l160 96-42-182 142-124-188-16-72-172-72 172-188 16 142 124-42 182zM938 394l-232 202 70 300-264-160-264 160 70-300-232-202 306-26 120-282 120 282z"></path>
                    </svg>
                    {!! trans('forum.followTag') !!} #TAG
                </a>
            @endif
            <button class="button button--grey forumBar__actions__link" onClick="window.location.reload()">
                <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path class="button__icon__path"
                          d="M754 270l100-100v300h-300l138-138q-76-76-180-76-106 0-181 75t-75 181 75 181 181 75q84 0 150-47t92-123h88q-28 112-120 184t-210 72q-140 0-240-100t-100-242 100-242 240-100q142 0 242 100z"></path>
                </svg>
                {!! trans('general.reload') !!}
            </button>
        </div>
        <div class="forumBar__filters">
            <strong class="forumBar__filters__name">{!! trans('forum.filter') !!} :</strong>
            <a href="#" class="forumBar__filter forumBar__filter--active">{!! trans('forum.filterChronology') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.filterPopular') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.filterTop') !!}</a>
            <strong class="forumBar__filters__name">{!! trans('forum.show') !!} :</strong>
            <a href="#" class="forumBar__filter forumBar__filter--active">{!! trans('forum.showAll') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showFollowed') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showMine') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showFriends') !!}</a>
        </div>
    </div>

    <div class="forumContainer">
        <aside class="followedTags">
            <h2 class="followedTags__name">{!! trans('forum.followedTags') !!}</h2>
            <ul class="followedTags__list">
                <li class="followedTags__item @if(Auth::check()) followedTags__item--lastOfficial @endif">
                    <a class="followedTags__item__link" href="{!! route('forum.tag') !!}">TAG_imposé</a>
                </li>
                @if(Auth::check())
                    <li class="followedTags__item">
                        <a class="followedTags__item__link" href="{!! route('forum.tag') !!}">
                            #TAG_suivi
                            <button class="followedTags__item__delete" title="{!! trans('general.delete') !!}">
                                <svg class="followedTags__item__delete__icon" version="1.1" viewBox="0 0 1024 1024"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                    <path class="followedTags__item__delete__icon__path"
                                          d="M726 554v-84h-428v84h428zM810 128q34 0 60 26t26 60v596q0 34-26 60t-60 26h-596q-34 0-60-26t-26-60v-596q0-34 26-60t60-26h596z"></path>
                                </svg>
                            </button>
                        </a>
                    </li>
                @endif
            </ul>
            @unless(Auth::check())
                <div class="followedTags__button">
                    <a href="#" class="button">{!! trans('forum.followedTagsLoginButton') !!}</a>
                </div>
            @endunless
        </aside>
        <article class="forumContainer__topic">
            <div class="forumContainer__topic__likes">
                <button class="forumContainer__topic__likes__like">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__like__path"
                              d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                    </svg>
                </button>
                <span class="forumContainer__topic__likes__counter">{{ rand(0, 20) }}</span>
                <button class="forumContainer__topic__likes__dislike">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__dislike__path"
                              d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                    </svg>
                </button>
            </div>
            <div class="forumContainer__topic__author">
                <a class="forumContainer__topic__author__link" href="#">
                    <img src="https://randomuser.me/api/portraits/thumb/women/2.jpg" alt="avatar"
                         class="forumContainer__topic__author__avatar">
                </a>
            </div>
            <div class="forumContainer__topic__info">
                <h2 class="forumContainer__topic__info__name">
                    <svg title="Verrouillé" class="forumContainer__topic__info__name__icon" version="1.1"
                         viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path class="path1"
                              d="M554 640v-86h-84v86h84zM554 470v-256h-84v256h84zM854 86q34 0 59 25t25 59v512q0 34-25 60t-59 26h-598l-170 170v-768q0-34 25-59t59-25h684z"></path>
                    </svg>
                    <a href="{!! route('forum.topic') !!}">Ce sujet est une annonce</a>
                </h2>
                <h3 class="forumContainer__topic__info__post">
                    <a class="forumContainer__topic__info__author" href="#">Auteur</a>, le
                    <time>JJ Mois AAAA</time>
                    <div class="forumContainer__topic__info__tags">
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                    </div>
                </h3>
            </div>
            <div class="forumContainer__topic__actions">
                <a class="forumContainer__topic__action" href="#">Marquer comme non lu</a>
                <a class="forumContainer__topic__action" href="#">Suivre ce sujet</a>
            </div>
            <div class="forumContainer__topic__meta">
                <h4 class="forumContainer__topic__meta__last">
                    <a class="forumContainer__topic__meta__author" href="#">Auteur</a>, il y a XX minutes
                </h4>
                <dl class="forumContainer__topic__meta__counter">
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                             version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                </dl>
            </div>
        </article>

        <article class="forumContainer__topic">
            <div class="forumContainer__topic__likes">
                <button class="forumContainer__topic__likes__like">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__like__path"
                              d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                    </svg>
                </button>
                <span class="forumContainer__topic__likes__counter">{{ rand(0, 20) }}</span>
                <button class="forumContainer__topic__likes__dislike">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__dislike__path"
                              d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                    </svg>
                </button>
            </div>
            <div class="forumContainer__topic__author">
                <a class="forumContainer__topic__author__link" href="#">
                    <img src="https://randomuser.me/api/portraits/thumb/men/1.jpg" alt="avatar"
                         class="forumContainer__topic__author__avatar">
                </a>
            </div>
            <div class="forumContainer__topic__info">
                <h2 class="forumContainer__topic__info__name">
                    <a href="{!! route('forum.topic') !!}">Ce sujet est normal</a>
                </h2>

                <h3 class="forumContainer__topic__info__post">
                    <a class="forumContainer__topic__info__author" href="#">Auteur</a>, le
                    <time>JJ Mois AAAA</time>
                    <div class="forumContainer__topic__info__tags">
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                    </div>
                </h3>
            </div>
            <div class="forumContainer__topic__actions">
                <a class="forumContainer__topic__action" href="#">Marquer comme non lu</a>
                <a class="forumContainer__topic__action" href="#">Suivre ce sujet</a>
            </div>
            <div class="forumContainer__topic__meta">
                <h4 class="forumContainer__topic__meta__last">
                    <a class="forumContainer__topic__meta__author" href="#">Auteur</a>, il y a XX minutes
                </h4>
                <dl class="forumContainer__topic__meta__counter">
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                             version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                </dl>
            </div>
        </article>

        <article class="forumContainer__topic">
            <div class="forumContainer__topic__likes">
                <button class="forumContainer__topic__likes__like">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__like__path"
                              d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                    </svg>
                </button>
                <span class="forumContainer__topic__likes__counter">{{ rand(0, 20) }}</span>
                <button class="forumContainer__topic__likes__dislike">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__dislike__path"
                              d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                    </svg>
                </button>
            </div>
            <div class="forumContainer__topic__author">
                <a class="forumContainer__topic__author__link" href="#">
                    <img src="https://randomuser.me/api/portraits/thumb/men/2.jpg" alt="avatar"
                         class="forumContainer__topic__author__avatar">
                </a>
            </div>
            <div class="forumContainer__topic__info">
                <h2 class="forumContainer__topic__info__name">
                    <svg title="Verrouillé" class="forumContainer__topic__info__name__icon" version="1.1"
                         viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M768 342v-86h-342v86h342zM768 470v-86h-342v86h342zM640 598v-86h-214v86h214zM342 342v-86h-86v86h86zM342 470v-86h-86v86h86zM342 598v-86h-86v86h86zM854 86q34 0 59 25t25 59v512q0 34-25 60t-59 26h-598l-170 170v-768q0-34 25-59t59-25h684z"></path>
                    </svg>
                    <a href="{!! route('forum.topic') !!}">Ce sujet contient un sondage</a>
                </h2>
                <h3 class="forumContainer__topic__info__post">
                    <a class="forumContainer__topic__info__author" href="#">Auteur</a>, le
                    <time>JJ Mois AAAA</time>
                    <div class="forumContainer__topic__info__tags">
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                    </div>
                </h3>
            </div>
            <div class="forumContainer__topic__actions">
                <a class="forumContainer__topic__action" href="#">Marquer comme non lu</a>
                <a class="forumContainer__topic__action" href="#">Suivre ce sujet</a>
            </div>
            <div class="forumContainer__topic__meta">
                <h4 class="forumContainer__topic__meta__last">
                    <a class="forumContainer__topic__meta__author" href="#">Auteur</a>, il y a XX minutes
                </h4>
                <dl class="forumContainer__topic__meta__counter">
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                             version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                </dl>
            </div>
        </article>

        <article class="forumContainer__topic">
            <div class="forumContainer__topic__likes">
                <button class="forumContainer__topic__likes__like">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__like__path"
                              d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                    </svg>
                </button>
                <span class="forumContainer__topic__likes__counter">{{ rand(0, 20) }}</span>
                <button class="forumContainer__topic__likes__dislike">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__dislike__path"
                              d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                    </svg>
                </button>
            </div>
            <div class="forumContainer__topic__author">
                <a class="forumContainer__topic__author__link" href="#">
                    <img src="https://randomuser.me/api/portraits/thumb/men/4.jpg" alt="avatar"
                         class="forumContainer__topic__author__avatar">
                </a>
            </div>
            <div class="forumContainer__topic__info">
                <h2 class="forumContainer__topic__info__name">
                    <svg title="Verrouillé" class="forumContainer__topic__info__name__icon" version="1.1"
                         viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M644 342v-86q0-54-39-93t-93-39-93 39-39 93v86h264zM512 726q34 0 60-26t26-60-26-60-60-26-60 26-26 60 26 60 60 26zM768 342q34 0 60 25t26 59v428q0 34-26 59t-60 25h-512q-34 0-60-25t-26-59v-428q0-34 26-59t60-25h42v-86q0-88 63-151t151-63 151 63 63 151v86h42z"></path>
                    </svg>
                    <a href="{!! route('forum.topic') !!}">Ce sujet est verrouillé</a>
                </h2>
                <h3 class="forumContainer__topic__info__post">
                    <a class="forumContainer__topic__info__author" href="#">Auteur</a>, le
                    <time>JJ Mois AAAA</time>
                    <div class="forumContainer__topic__info__tags">
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                    </div>
                </h3>
            </div>
            <div class="forumContainer__topic__actions">
                <a class="forumContainer__topic__action" href="#">Marquer comme non lu</a>
                <a class="forumContainer__topic__action" href="#">Suivre ce sujet</a>
            </div>
            <div class="forumContainer__topic__meta">
                <h4 class="forumContainer__topic__meta__last">
                    <a class="forumContainer__topic__meta__author" href="#">Auteur</a>, il y a XX minutes
                </h4>
                <dl class="forumContainer__topic__meta__counter">
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                             version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                </dl>
            </div>
        </article>

        <article class="forumContainer__topic forumContainer__topic--new">
            <div class="forumContainer__topic__likes">
                <button class="forumContainer__topic__likes__like">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__like__path"
                              d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                    </svg>
                </button>
                <span class="forumContainer__topic__likes__counter">{{ rand(0, 20) }}</span>
                <button class="forumContainer__topic__likes__dislike">
                    <svg class="forumContainer__topic__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="forumContainer__topic__likes__dislike__path"
                              d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                    </svg>
                </button>
            </div>
            <div class="forumContainer__topic__author">
                <a class="forumContainer__topic__author__link" href="#">
                    <img src="https://randomuser.me/api/portraits/thumb/men/3.jpg" alt="avatar"
                         class="forumContainer__topic__author__avatar">
                </a>
            </div>
            <div class="forumContainer__topic__info">
                <h2 class="forumContainer__topic__info__name">
                    <a href="{!! route('forum.topic') !!}">Ce sujet n'a pas encore été lu</a>
                </h2>

                <h3 class="forumContainer__topic__info__post">
                    <a class="forumContainer__topic__info__author" href="#">Auteur</a>, le
                    <time>JJ Mois AAAA</time>
                    <div class="forumContainer__topic__info__tags">
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="forumContainer__topic__info__tag">#TAG</a>
                    </div>
                </h3>
            </div>
            <div class="forumContainer__topic__actions">
                <a class="forumContainer__topic__action" href="#">Marquer comme lu</a>
                <a class="forumContainer__topic__action" href="#">Suivre ce sujet</a>
            </div>
            <div class="forumContainer__topic__meta">
                <h4 class="forumContainer__topic__meta__last">
                    <a class="forumContainer__topic__meta__author" href="#">Auteur</a>, il y a XX minutes
                </h4>
                <dl class="forumContainer__topic__meta__counter">
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                             version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    <dd class="forumContainer__topic__meta__counter__icon">
                        <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                        </svg>
                    </dd>
                    <dt class="forumContainer__topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                </dl>
            </div>
        </article>

        <div class="pagination__container">
            <ul class="pagination">
                <li class="disabled">
                    <a href="#">«</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li class="disabled">
                    <span>...</span>
                </li>
                <li>
                    <a href="#">12</a>
                </li>
                <li>
                    <a href="#">»</a>
                </li>
            </ul>
        </div>
    </div>
    @parent
@endsection

@section('scripts')
    @parent
    FollowTags.init();
@endsection