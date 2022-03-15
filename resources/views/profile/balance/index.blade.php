@extends('layout.main-layout')

@section('title', 'Balance')


@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__title">
                {{ $user->nickname }} profile
            </div>
            <div class="profile__info">
                <div class="profile_info-title">
                    Balance:<span>{{ \App\Models\Profile\Balance::whereUserId(Auth::id())->first()->balance }}$</span>
                </div>
                <div class="profile__inner">
                    @include("layout.profileMenu")
                    <div class="profile__main">
                        <form action="{{ route('profile.balance.store') }}" class="balance__form" method="post">
                            @csrf
                            <label class="balance__label">
                                <div class="label__text">
                                    Top up balance
                                </div>
                                <input type="number" class="balance__input" name="balance" value="{{ old('balance') }}">
                                @error('balance')
                                    <div class="form_error-msg">{{ $message }}</div>
                                @enderror
                            </label>
                            <input type="submit" class="balance-btn" value="Top Up">
                        </form>
{{--                        <div class="balance">--}}
{{--                            <span>{{ \App\Models\Profile\Balance::whereUserId(Auth::id())->first()->balance }}$</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
