@extends('layout.main-layout')

@section('title', 'Draft')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Draft Post
            </div>
            <div class="blog__inner">
                @include('layout.blogMenu')
                <div class="blog__list">
                    @foreach($posts as $post)
                        <div class="blog__list-item">
                            <div class="blog__item-name">
                                <a href="{{ route('blog.posts.show', $post->id) }}" class="post-title">
                                    {{ strip_tags($post->title) }}
                                </a>
                                <a class="post-category" href="{{ route('blog.category.show', $post->category_id) }}">
                                    {{ \App\Models\Blog\Category::withTrashed()->find($post->category_id)->title }}
                                </a>
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
                                    Public: {{ $post->created_at }}
                                </div>
                                <a class="blog__item-read-btn" href="{{ route('blog.myblog.edit', $post->id) }}">
                                    Change
                                </a>
                                <a class="blog__item-read-btn" href="{{ route('blog.draft.update', $post->id) }}">
                                    Public
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

