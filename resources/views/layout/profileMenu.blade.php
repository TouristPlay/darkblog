<div class="profile__nav">
    <ul class="blog__nav-list">
        <li class="blog__nav-list-item">
            <a href="{{ route('profile.index', $nickname) }}" class="blog__item-link">
                Personal Data
            </a>
        </li>
        <li class="profile__list-item">
            <a href="{{ route("profile.statistic.index", $nickname) }}" class="profile__item-link">
                Statistic
            </a>
        </li>
{{--        <li class="profile__list-item">--}}
{{--            <a href="" class="profile__item-link">--}}
{{--                Favorite--}}
{{--            </a>--}}
{{--        </li>--}}
        @if($nickname == Auth::getUser()->nickname)
            <li class="profile__list-item">
                <a href="{{ route('profile.balance.index', $nickname) }}" class="profile__item-link">
                    Balance
                </a>
            </li>
        @endif
        @if($nickname == Auth::getUser()->nickname)
            @can('view', auth()->user())
                <li class="profile__list-item">
                    <a href="{{ route('admin.index') }}" class="profile__item-link">
                        Admin panel
                    </a>
                </li>
            @endcan
        @endif
    </ul>
</div>
