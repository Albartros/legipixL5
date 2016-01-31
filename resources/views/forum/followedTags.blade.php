<aside class="followedTags">
    <h2 class="followedTags__name">{!! trans('forum.tagFollowed') !!}</h2>
    <ul class="followedTags__list">
        <li class="followedTags__item @if(Auth::check()) followedTags__item--lastOfficial @endif">
            <a class="followedTags__item__link" href="{!! route('forum.getForum') !!}">TAG_imposé</a>
        </li>
        @if(Auth::check())
            @foreach(Auth::user()->tags as $tag)
                <li class="followedTags__item">
                    <a class="followedTags__item__link" href="{!! route('forum.getForum') !!}">
                        @if($tag->is_official){{ $tag->name }}@else#{{ $tag->name }}@endif
                        <button data-tag-id="{{ $tag->id }}" class="followedTags__item__delete" title="{!! trans
                        ('general.delete') !!}">
                            <svg class="followedTags__item__delete__icon" version="1.1" viewBox="0 0 1024 1024"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <path class="followedTags__item__delete__icon__path"
                                      d="M726 554v-84h-428v84h428zM810 128q34 0 60 26t26 60v596q0 34-26 60t-60 26h-596q-34 0-60-26t-26-60v-596q0-34 26-60t60-26h596z"></path>
                            </svg>
                        </button>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
    @unless(Auth::check())
        <div class="followedTags__button">
            <a href="#" class="button">{!! trans('forum.tagLoginButton') !!}</a>
        </div>
    @endunless
</aside>