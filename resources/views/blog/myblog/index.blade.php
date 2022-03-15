@extends('layout.main-layout')

@section('title', 'MyBlog')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                MyBlog Post
                <a href="{{ route('blog.myblog.create') }}" class="create-btn">
                    Create
                </a>
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
                                <div class="myblog_link">
                                    <a class="post-category" href="{{ route('blog.category.show', $post->category_id) }}">
                                        {{ \App\Models\Blog\Category::withTrashed()->find($post->category_id)->title }}
                                    </a>
                                    <a href="{{ route('blog.myblog.delete', $post->id) }}" class="delete-post">
                                        <img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/20/000000/external-delete-multimedia-kiranshastry-lineal-color-kiranshastry.png"/>
                                    </a>
                                </div>
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
{{--                                <a class="blog__item-read-btn" href="{{ route('blog.posts.show', $post->id) }}">--}}
{{--                                    Read--}}
{{--                                </a>--}}
                                <a class="blog__item-read-btn" href="{{ route('blog.myblog.edit', $post->id) }}">
                                    Change
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

