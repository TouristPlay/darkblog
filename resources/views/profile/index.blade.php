@extends('layout.main-layout')

@section('title', 'Profile')


@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__title">
                {{ $user->nickname }} profile
            </div>
            <div class="profile__info">
                <div class="profile_info-title">
                    Personal Data
                </div>
                <div class="profile__inner">
                    @include("layout.profileMenu")
                    <div class="profile__main">
                        <div class="user__data">
                            <div class="label-text">
                                Your name
                            </div>
                            <div class="user-text">
                                {{ strip_tags($user->name) }} {{ strip_tags($user->lastname) }}
                            </div>
                        </div>
                        <div class="user__data">
                            <div class="label-text">
                                Your email
                            </div>
                            <div class="user-text">
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="user__data">
                            <div class="label-text">
                                Your nickname
                            </div>
                            <div class="user-text">
                                {{ $user->nickname }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
