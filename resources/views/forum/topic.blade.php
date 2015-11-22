@extends('layout.layout')

@section('title', 'Titre du topic - ' . trans('forum.pageTitleBase'))

@section('content')
    <header class="header">
        <img src="{!! asset('img/temporary/banner.jpg') !!}" alt="forum-banner" class="header__background">
        <nav class="breadcrumb">
            <a class="breadcrumb__link" href="{!! route('forum') !!}">{!! trans('forum.forum') !!}</a><span
                    class="breadcrumb__spacer">//</span><a class="breadcrumb__link" href="{!! route('forum.tag') !!}">Tag</a><span
                    class="breadcrumb__spacer">//</span><span class="breadcrumb__item">Titre du topic</span>
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
                {!! trans('general.answer') !!}
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
                    <span id="followTagText">{!! trans('forum.followTopic') !!}</span>
                    <span style="display: none" id="followedTagText">{!! trans('forum.unfollowTopic') !!}</span>
                </button>
            @else
                <a class="button button--grey forumBar__actions__link" href="#">
                    <svg class="button__icon" version="1.1" viewBox="0 0 1024 1024"
                         xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <path class="button__icon__path"
                              d="M512 658l160 96-42-182 142-124-188-16-72-172-72 172-188 16 142 124-42 182zM938 394l-232 202 70 300-264-160-264 160 70-300-232-202 306-26 120-282 120 282z"></path>
                    </svg>
                    {!! trans('forum.followTopic') !!}
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
            <strong class="forumBar__filters__name">{!! trans('forum.show') !!} :</strong>
            <a href="#" class="forumBar__filter forumBar__filter--active">{!! trans('forum.showAll') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showPositives') !!}</a>
            <a href="#" class="forumBar__filter">{!! trans('forum.showControversial') !!}</a>
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
        <article class="post">
            <div class="topic">
                <div class="topic__info">
                    <h1 class="topic__info__name">Titre du topic</h1>

                    <div class="topic__info__tags">
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="topic__info__tag">#TAG</a>
                        <a href="{!! route('forum.tag') !!}" rel="tag" class="topic__info__tag">#TAG</a>
                    </div>
                </div>
                <div class="topic__meta">
                    <dl class="topic__meta__counter">
                        <dd class="topic__meta__counter__icon">
                            <svg class="topic__meta__counter__icon__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path d="M512 384q52 0 90 38t38 90-38 90-90 38-90-38-38-90 38-90 90-38zM512 726q88 0 151-63t63-151-63-151-151-63-151 63-63 151 63 151 151 63zM512 192q158 0 286 88t184 232q-56 144-184 232t-286 88-286-88-184-232q56-144 184-232t286-88z"></path>
                            </svg>
                        </dd>
                        <dt class="topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                        <dd class="topic__meta__counter__icon">
                            <svg class="topic__meta__counter__icon__icon topic__meta__counter__icon__icon--smaller"
                                 version="1.1" viewBox="0 0 896 1024" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M938 170v768l-170-170h-598q-34 0-59-26t-25-60v-512q0-34 25-59t59-25h684q34 0 59 25t25 59z"></path>
                            </svg>
                        </dd>
                        <dt class="topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                        <dd class="topic__meta__counter__icon">
                            <svg class="topic__meta__counter__icon__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path d="M512 598q108 0 225 47t117 123v86h-684v-86q0-76 117-123t225-47zM512 512q-70 0-120-50t-50-120 50-121 120-51 120 51 50 121-50 120-120 50z"></path>
                            </svg>
                        </dd>
                        <dt class="topic__meta__counter__value">{{ rand(0, 20) }}</dt>
                    </dl>
                </div>
            </div>

            <div class="poll">
                <h2 class="poll__question"><strong>Sondage :</strong> Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit. Explicabo consequatur cumque ut ?</h2>

                <div class="poll__container">
                    <div class="poll__answer">Lorem ipsum dolor sit amet, consectetur <strong>(44%)</strong></div>
                    <div class="poll__bar">
                        <div class="poll__bar__value" data-value="44%"></div>
                    </div>
                    <div class="poll__answer">Lorem ipsum dolor sit amet, consectetur <strong>(20%)</strong></div>
                    <div class="poll__bar">
                        <div class="poll__bar__value" data-value="20%"></div>
                    </div>
                    <div class="poll__answer">Lorem ipsum dolor sit amet, consectetur <strong>(36%)</strong></div>
                    <div class="poll__bar">
                        <div class="poll__bar__value" data-value="36%"></div>
                    </div>
                </div>
                <div class="poll__meta">1250 participants</div>
            </div>

            <div class="post__content">
                <img src="{!! asset('img/temporary/banner_halo.jpg') !!}" alt="banner-halo">

                <h1>Lorem ipsum dolor sit amet, consectetur !</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia <strong>quibusdam numquam</strong>,
                    magni impedit soluta vel asperiores veniam debitis magnam minima.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur <a href="http://www.google.fr/">adipisicing elit</a>. Ad,
                    iure!</p>

                <h2>Lorem ipsum dolor sit amet, consectetur !</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione atque expedita officiis corrupti
                    vel, nihil, commodi, nulla quisquam nemo eum id nisi debitis amet ab.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                </ul>
                <h3>Lorem ipsum dolor sit amet, consectetur !</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione atque expedita officiis corrupti
                    vel, nihil, commodi, nulla quisquam nemo eum id nisi debitis amet ab.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                </ul>
                <h4>Lorem ipsum dolor sit amet, consectetur !</h4>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione atque expedita officiis corrupti
                    vel, nihil, commodi, nulla quisquam nemo eum id nisi debitis amet ab.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                </ul>
                <h5>Lorem ipsum dolor sit amet, consectetur !</h5>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione atque expedita officiis corrupti
                    vel, nihil, commodi, nulla quisquam nemo eum id nisi debitis amet ab.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit.</li>
                </ul>
            </div>
            <footer class="post__footer">
                <div class="post__likes">
                    <button class="post__likes__like">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__like__path"
                                  d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                        </svg>
                    </button>
                    <span class="post__likes__counter">{{ rand(0, 20) }}</span>
                    <button class="post__likes__dislike">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__dislike__path"
                                  d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                        </svg>
                    </button>
                </div>
                <div class="post__author">
                    <img src="https://randomuser.me/api/portraits/thumb/men/12.jpg" alt="avatar"
                         class="post__author__avatar">

                    <div class="post__author__info">
                        <a href="#" class="post__author__info__name">Auteur</a>

                        <div class="post__author__info__quote">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                </div>
                <div class="post__meta">
                    <time class="post__meta__date">12 juillet 2015</time>
                    <div class="post__meta__links">
                        <a class="post__meta__link" href="#">
                            Citer
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M598 726l84-172h-128v-256h256v256l-84 172h-128zM256 726l86-172h-128v-256h256v256l-86 172h-128z"></path>
                            </svg>
                        </a>
                        <a class="post__meta__link" href="#">
                            Permalien
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M726 298q88 0 150 63t62 151-62 151-150 63h-172v-82h172q54 0 93-39t39-93-39-93-93-39h-172v-82h172zM342 554v-84h340v84h-340zM166 512q0 54 39 93t93 39h172v82h-172q-88 0-150-63t-62-151 62-151 150-63h172v82h-172q-54 0-93 39t-39 93z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
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

        <article class="post">
            <header class="post__header">
                <div class="post__likes">
                    <button class="post__likes__like">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__like__path"
                                  d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                        </svg>
                    </button>
                    <span class="post__likes__counter">{{ rand(0, 20) }}</span>
                    <button class="post__likes__dislike">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__dislike__path"
                                  d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                        </svg>
                    </button>
                </div>
                <div class="post__author">
                    <img src="https://randomuser.me/api/portraits/thumb/men/11.jpg" alt="avatar"
                         class="post__author__avatar">

                    <div class="post__author__info">
                        <a href="#" class="post__author__info__name">Auteur</a>

                        <div class="post__author__info__quote">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="post__meta">
                    <time class="post__meta__date">12 juillet 2015</time>
                    <div class="post__meta__links">
                        <a class="post__meta__link" href="#">
                            Citer
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M598 726l84-172h-128v-256h256v256l-84 172h-128zM256 726l86-172h-128v-256h256v256l-86 172h-128z"></path>
                            </svg>
                        </a>
                        <a class="post__meta__link" href="#">
                            Permalien
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M726 298q88 0 150 63t62 151-62 151-150 63h-172v-82h172q54 0 93-39t39-93-39-93-93-39h-172v-82h172zM342 554v-84h340v84h-340zM166 512q0 54 39 93t93 39h172v82h-172q-88 0-150-63t-62-151 62-151 150-63h172v82h-172q-54 0-93 39t-39 93z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>
            <div class="post__content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo iusto illo, corporis expedita,
                    doloribus cum nobis in provident ipsum quidem, voluptates maiores autem harum praesentium! Maxime,
                    sit rerum praesentium nesciunt cupiditate.</p>
            </div>
        </article>

        <article class="post">
            <header class="post__header">
                <div class="post__likes">
                    <button class="post__likes__like">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__like__path"
                                  d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                        </svg>
                    </button>
                    <span class="post__likes__counter">{{ rand(0, 20) }}</span>
                    <button class="post__likes__dislike">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__dislike__path"
                                  d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                        </svg>
                    </button>
                </div>
                <div class="post__author post__author--banned">
                    <img src="https://randomuser.me/api/portraits/thumb/men/14.jpg" alt="avatar"
                         class="post__author__avatar">

                    <div class="post__author__info">
                        <a href="#" class="post__author__info__name">Auteur</a>

                        <div class="post__author__info__quote">Lorem ipsum dolor sit amet.</div>
                    </div>
                </div>
                <div class="post__meta">
                    <time class="post__meta__date">12 juillet 2015</time>
                    <div class="post__meta__links">
                        <a class="post__meta__link" href="#">
                            Citer
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M598 726l84-172h-128v-256h256v256l-84 172h-128zM256 726l86-172h-128v-256h256v256l-86 172h-128z"></path>
                            </svg>
                        </a>
                        <a class="post__meta__link" href="#">
                            Permalien
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M726 298q88 0 150 63t62 151-62 151-150 63h-172v-82h172q54 0 93-39t39-93-39-93-93-39h-172v-82h172zM342 554v-84h340v84h-340zM166 512q0 54 39 93t93 39h172v82h-172q-88 0-150-63t-62-151 62-151 150-63h172v82h-172q-54 0-93 39t-39 93z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>
            <div class="post__content">
                <div class="post__mod">
                    <div class="post__mod__icon">
                        <svg class="post__mod__icon__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__mod__icon__path"
                                  d="M512 42l384 172v256q0 178-110 325t-274 187q-164-40-274-187t-110-325v-256zM512 512v382q118-38 200-143t98-239h-298zM512 512v-376l-298 132v244h298z"></path>
                        </svg>
                    </div>
                    <div class="post__mod__note">
                        <strong>{!! trans('forum.moderation') !!} : </strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem
                        quasi atque quod !
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo iusto illo, corporis expedita,
                    doloribus cum nobis in provident ipsum quidem, voluptates maiores autem harum praesentium! Maxime,
                    sit rerum praesentium nesciunt cupiditate.</p>
            </div>
        </article>

        <article class="post">
            <header class="post__header">
                <div class="post__likes">
                    <button class="post__likes__like">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__like__path"
                                  d="M316 658l-60-60 256-256 256 256-60 60-196-196z"></path>
                        </svg>
                    </button>
                    <span class="post__likes__counter">{{ rand(0, 20) }}</span>
                    <button class="post__likes__dislike">
                        <svg class="post__likes__icon" version="1.1" viewBox="0 0 1024 1024"
                             xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <path class="post__likes__dislike__path"
                                  d="M316 334l196 196 196-196 60 60-256 256-256-256z"></path>
                        </svg>
                    </button>
                </div>
                <div class="post__author">
                    <img src="https://randomuser.me/api/portraits/thumb/men/12.jpg" alt="avatar"
                         class="post__author__avatar">

                    <div class="post__author__info">
                        <a href="#" class="post__author__info__name">Auteur</a>

                        <div class="post__author__info__op">OP</div>
                        <div class="post__author__info__quote">Lorem ipsum dolor sit amet, consectetur.</div>
                    </div>
                </div>
                <div class="post__meta">
                    <time class="post__meta__date">12 juillet 2015</time>
                    <div class="post__meta__links">
                        <a class="post__meta__link" href="#">
                            Citer
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M598 726l84-172h-128v-256h256v256l-84 172h-128zM256 726l86-172h-128v-256h256v256l-86 172h-128z"></path>
                            </svg>
                        </a>
                        <a class="post__meta__link" href="#">
                            Permalien
                            <svg class="post__meta__link__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="post__meta__link__icon__path"
                                      d="M726 298q88 0 150 63t62 151-62 151-150 63h-172v-82h172q54 0 93-39t39-93-39-93-93-39h-172v-82h172zM342 554v-84h340v84h-340zM166 512q0 54 39 93t93 39h172v82h-172q-88 0-150-63t-62-151 62-151 150-63h172v82h-172q-54 0-93 39t-39 93z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>
            <div class="post__content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo iusto illo, corporis expedita,
                    doloribus cum nobis in provident ipsum quidem, voluptates maiores autem harum praesentium! Maxime,
                    sit rerum praesentium nesciunt cupiditate.</p>
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
    Poll.init();
@endsection