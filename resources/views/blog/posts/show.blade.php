@extends('layout.main-layout')

@section('title', strip_tags($post->title) )

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                <div class="blog__item-name">
                    {{ strip_tags($post->title) }}
                </div>
            </div>
            <div class="blog__inner">
                @include('layout.blogMenu')
                <div class="blog__list">
                    <div class="blog__list-item">
                        <div class="blog__item-text">
                            {!! $post->content !!}
                        </div>
                        <div class="blog__item-footer">
                            <div class="blog__item-author">
                                <a href="{{ route('profile.index', \App\Models\User::find($post->user_id)->nickname) }}" class="blog__item-author-profile">
                                    {{'@' . \App\Models\User::find($post->user_id)->nickname }}
                                </a>
                            </div>
                            <div class="blog__item-category">
                                Category:
                                <a class="link" href="{{ route('blog.category.show', $post->category_id) }}">
                                    {{ \App\Models\Blog\Category::withTrashed()->find($post->category_id)->title }}
                                </a>
                            </div>

                            <div class="blog__item-public">
                                Public: {{ $post->created_at }}
                            </div>
                            @include('layout.blog_Favorite_Icon')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
