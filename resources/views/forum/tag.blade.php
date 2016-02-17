@extends('layout.layout')

@section('title', e($tag->name).' - '.trans('forum.pageTitle'))

@section('content')
    <header class="header">
        <img src="{!! asset('img/temporary/banner.jpg') !!}" alt="forum-banner" class="header__background">
        <nav class="breadcrumb">
            <a class="breadcrumb__link" href="{!! route('forum.getForum') !!}">{!! trans('forum.forum') !!}</a><span class="breadcrumb__spacer">//</span><span class="breadcrumb__item">@if($tag->is_official){{ $tag->name }}@else#{{ $tag->name }}@endif
            </span>
        </nav>
        <h1 class="header__tag @if( ! $tag->is_official)header__tag--unofficial @endif">{{ $tag->name }}</h1>
    </header>

    <div class="forumBar">
        <div class="forumBar__actions">
            <a class="button forumBar__actions__link" href="#">
                <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path class="button__icon__path" d="M810
                    554h-256v256h-84v-256h-256v-84h256v-256h84v256h256v84z"></path>
                </svg>
                {!! trans('general.new') !!}
            </a>
            @if(\Auth::check())
                <button id="followTag" data-tag="Tag" class="disabled button button--grey forumBar__actions__link">
                    <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="button__icon__path" d="M512 658l160 96-42-182 142-124-188-16-72-172-72 172-188 16 142 124-42 182zM938 394l-232 202 70 300-264-160-264 160 70-300-232-202 306-26 120-282 120 282z"></path>
                        <path id="followedPath" style="display: none;" class="button__icon__path" d="M512 736l-264 160 70-300-232-202 306-26 120-282 120 282 306 26-232 202 70 300z"></path>
                    </svg>
                    <span id="followTagText">{!! trans('forum.followTag') !!}</span><span style="display: none" id="followedTagText">{!! trans('forum.tagUnfollow') !!}</span>@if($tag->is_official){{ $tag->name }}@else#{{ $tag->name }}@endif
                </button>
            @else
                <a class="disabled button button--grey forumBar__actions__link" href="#">
                    <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="button__icon__path" d="M512 658l160 96-42-182 142-124-188-16-72-172-72 172-188 16 142 124-42 182zM938 394l-232 202 70 300-264-160-264 160 70-300-232-202 306-26 120-282 120 282z"></path>
                    </svg>
                    {!! trans('forum.tagFollow') !!}@if($tag->is_official){{ $tag->name }}@else#{{ $tag->name }}@endif
                </a>
            @endif
            <button class="button button--grey forumBar__actions__link" onClick="window.location.reload()">
                <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                     xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                    <path class="button__icon__path" d="M754 270l100-100v300h-300l138-138q-76-76-180-76-106 0-181
                    75t-75 181 75 181 181 75q84 0 150-47t92-123h88q-28 112-120 184t-210 72q-140 0-240-100t-100-242 100-242 240-100q142 0 242 100z"></path>
                </svg>
                {!! trans('general.reload') !!}
            </button>
        </div>
        <div class="forumBar__filters">
            <strong class="forumBar__filters__name">{!! trans('forum.filterBy') !!} :</strong>
            <a href="#" class="forumBar__filter forumBar__filter--active">{!! trans('forum.filterClassic') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.filterPopular') !!}</a>
            <strong class="forumBar__filters__name">{!! trans('forum.showBy') !!} :</strong>
            <a href="#" class="forumBar__filter forumBar__filter--active">Tous</a>
            <a href="#" class="forumBar__filter">Aimés</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showMine') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showFriends') !!}</a>
        </div>
    </div>

    <div class="forumContainer">
        @include('forum.followedTags')

        @foreach($topics as $topic)
            <article class="forumContainer__topic">
                <div class="forumContainer__like">
                    <button class="forumContainer__like__holder {{ $topic->posts->first()->liked() ? 'forumContainer__like__holder--active' : null }}">
                        <svg class="forumContainer__like__icon" version="1.1"
                             viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M512 950.857q-14.857 0-25.143-10.286l-356.571-344q-5.714-4.571-15.714-14.857t-31.714-37.429-38.857-55.714-30.571-69.143-13.429-78.857q0-125.714 72.571-196.571t200.571-70.857q35.429 0 72.286 12.286t68.571 33.143 54.571 39.143 43.429 38.857q20.571-20.571 43.429-38.857t54.571-39.143 68.571-33.143 72.286-12.286q128 0 200.571 70.857t72.571 196.571q0 126.286-130.857 257.143l-356 342.857q-10.286 10.286-25.143 10.286z"></path>
                        </svg>
                    </button>
                </div>
                <div class="forumContainer__theTopic">
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
                            <a href="{!! route('forum.getTopic', [(int) $topic->id, str_slug($topic->name)]) !!}">{{ $topic->name }}</a>
                        </h2>
                        <h3 class="forumContainer__topic__info__post">
                            <a class="forumContainer__topic__info__author"
                               href="{!! route('user.getUser', [e($topic->posts->first()->user->slug)]) !!}">{{ $topic->posts->first()->user->name }}</a>,
                            <time>{{ $topic->posts->first()->created_at->isToday() ? $topic->posts->first()->created_at->diffForHumans() : $topic->posts->first()->created_at->formatLocalized('le %d-%m-%Y') }}</time>
                            <div class="forumContainer__topic__info__tags">
                                @foreach($topic->tags as $tag)
                                    <a href="{!! route('forum.getTag', [e($tag->slug)]) !!}" rel="tag"
                                       class="forumContainer__topic__info__tag">#{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </h3>
                    </div>
                    <div class="forumContainer__topic__actions">
                        <a class="forumContainer__topic__action" href="#">Marquer comme non lu</a>
                        <a class="forumContainer__topic__action" href="#">Suivre ce sujet</a>
                    </div>
                    <div class="forumContainer__topic__meta">
                        <h4 class="forumContainer__topic__meta__last">
                            <a class="forumContainer__topic__meta__author" href="#">{{ $topic->posts->last()
                            ->user->name }}</a>, {!! $topic->posts->last()->created_at->isToday() ? $topic->posts->last()->created_at->diffForHumans() : $topic->posts->last()->created_at->formatLocalized('le %d-%m-%Y') !!}
                        </h4>
                        <dl class="forumContainer__topic__meta__counter">
                            <dd class="forumContainer__topic__meta__counter__icon">
                                <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                                     version="1.1"
                                     viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M512 950.857q-14.857 0-25.143-10.286l-356.571-344q-5.714-4.571-15.714-14.857t-31.714-37.429-38.857-55.714-30.571-69.143-13.429-78.857q0-125.714 72.571-196.571t200.571-70.857q35.429 0 72.286 12.286t68.571 33.143 54.571 39.143 43.429 38.857q20.571-20.571 43.429-38.857t54.571-39.143 68.571-33.143 72.286-12.286q128 0 200.571 70.857t72.571 196.571q0 126.286-130.857 257.143l-356 342.857q-10.286 10.286-25.143 10.286z"></path>
                                </svg>
                            </dd>
                            <dt class="forumContainer__topic__meta__counter__value">{{ $topic->posts->first()->likeCount }}</dt>
                            <dd class="forumContainer__topic__meta__counter__icon">
                                <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                                     viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                                </svg>
                            </dd>
                            <dt class="forumContainer__topic__meta__counter__value">{{ $topic->views }}</dt>
                            <dd class="forumContainer__topic__meta__counter__icon">
                                <svg class="forumContainer__topic__meta__counter__icon__icon forumContainer__topic__meta__counter__icon__icon--smaller"
                                     version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                                </svg>
                            </dd>
                            <dt class="forumContainer__topic__meta__counter__value">{!! $topic->posts->count() !!}</dt>
                            <dd class="forumContainer__topic__meta__counter__icon">
                                <svg class="forumContainer__topic__meta__counter__icon__icon" version="1.1"
                                     viewBox="0 0 1024 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                                </svg>
                            </dd>
                            <dt class="forumContainer__topic__meta__counter__value">{{ $topic->posts->unique('user')->count() }}</dt>
                        </dl>
                    </div>
                </div>
            </article>
        @endforeach
        <div class="pagination__container">
            {!! $topics->links() !!}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    FollowTags.init();
@endsection