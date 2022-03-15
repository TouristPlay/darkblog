@extends('layout.main-layout')

@section('title', 'Blog')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                {{ $nickname }} posts
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
                                    <a href="{{ route('profile.index', $nickname) }}" class="blog__item-author-profile">
                                        {{'@' . $nickname }}
                                    </a>
                                </div>
                                <div class="blog__item-public">
                                    Public: {{ $post->created_at }}
                                </div>
                                <a class="blog__item-read-btn" href="{{ route('blog.posts.show', $post->id) }}">
                                    Read
                                </a>
                                @include('layout.blog_Favorite_Icon')
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $posts->links() }}
        </div>
    </section>
@endsection
