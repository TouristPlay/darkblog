@extends('layout.main-layout')

@section('title', $category->title)

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                {{ $category->title }} category
            </div>
            <div class="blog__inner">
                @include('layout.blogMenu')
                <div class="blog__list">
                    @foreach($posts as $post)
                        <div class="blog__list-item">
                            <div class="blog__item-name">
                                {{ strip_tags($post->title) }}
                            </div>
                            <div class="blog__item-short-text">
                                {!! strip_tags($post->content) !!}
                            </div>
                            <div class="blog__item-footer">
                                <div class="blog__item-author">
                                    <a href="{{ route('profile.index', \App\Models\User::find($post->user_id)->nickname) }}" class="blog__item-author-profile">
                                        {{'@' . \App\Models\User::find($post->user_id)->nickname }}
                                    </a>
                                </div>
                                <div class="blog__item-public">
                                    Public time: {{ $post->created_at }}
                                </div>
                                <a class="blog__item-read-btn" href="{{ route('blog.posts.show', $post->id) }}">
                                    Read Post
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $posts->links() }}
        </div>
    </section>
@endsection
