@extends('layout.main-layout')

@section('title', 'Admin')


@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__title">
                Admin Panel
            </div>
            <div class="profile__info">
                <div class="profile_info-title">
                    Statistic
                </div>
                <div class="profile__inner">
                    @include('layout.adminMenu')
                    <div class="profile__main">
                        <div class="counter__inner ">
                            <div class="counter__title">
                                User counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\User::count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                Category counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\Blog\Category::count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                Posts counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\Blog\Post::count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                Topic counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\Forum\Topic::count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                Rubric counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\Forum\Rubric::count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                Message counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\Forum\Message::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
