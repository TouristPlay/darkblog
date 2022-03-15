@extends('layout.main-layout')

@section('title', 'Statistic')


@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__title">
                {{ $user->nickname }} profile
            </div>
            <div class="profile__info">
                <div class="profile_info-title">
                    Statistic
                </div>
                <div class="profile__inner">
                    @include("layout.profileMenu")
                    <div class="profile__main">
                        <div class="counter__inner ">
                            <div class="counter__title">
                                <a title="Open all user posts" href="{{ route('blog.posts.author.show', $user->nickname) }}" class="link">
                                    Posts counter
                                    <img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/20/000000/external-search-casino-icongeek26-linear-colour-icongeek26.png"/>
                                </a>
                            </div>
                            <div class="counter">
                                {{ \App\Models\Blog\Post::whereUserId($user->id)->count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                <a title="Open all user topic" href="{{ route('forum.topic.author.index', $user->nickname) }}" class="link">
                                    Topic counter
                                    <img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/20/000000/external-search-casino-icongeek26-linear-colour-icongeek26.png"/>
                                </a>
                            </div>
                            <div class="counter">
                                {{ \App\Models\Forum\Topic::whereUserId($user->id)->count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                Message counter
                            </div>
                            <div class="counter">
                                {{ \App\Models\Forum\Message::whereUserId($user->id)->count() }}
                            </div>
                        </div>
                        <div class="counter__inner ">
                            <div class="counter__title">
                                <a title="Open all user topic" href="{{ route('shop.product.author.index', $user->nickname) }}" class="link">
                                    Product counter
                                    <img src="https://img.icons8.com/external-icongeek26-linear-colour-icongeek26/20/000000/external-search-casino-icongeek26-linear-colour-icongeek26.png"/>
                                </a>
                            </div>
                            <div class="counter">
                                {{ \App\Models\Shop\Product::whereUserId($user->id)->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
