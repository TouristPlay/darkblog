
@extends('layout.main-layout')

@section('title', $rubric->title)

@section('content')
    <section class="forum">
        <div class="container">
            <div class="forum__title">
                {{ $rubric->title }}
            </div>
            <div class="blog__inner">
                @include('layout.ForumMenu')
                <div class="blog__list">
                    @foreach($topics as $topic)
                        <div class="blog__list-item topic__list-item">
                            <div class="blog__item-name topic__item-name">
                                <a href="{{ route('forum.topic.show', $topic->id) }}" class="post-title">
                                    {{ strip_tags($topic->title) }}
                                </a>
                                <div class="myblog_link">
                                    <a class="post-category" href="{{ route('forum.rubric.show', $topic->rubric_id) }}">
                                        {{ \App\Models\Forum\Rubric::find($topic->rubric_id)->title }}
                                    </a>
                                    <div class="message_count">
                                        <img src="https://img.icons8.com/office/20/000000/chat-message.png"/>
                                        {{ $topic->message_counter }}
                                    </div>
                                </div>
                            </div>
                            <div class="blog__item-footer topic__item-footer">
                                <div class="blog__item-author topic__item-author">
                                    <a href="{{ route('profile.index', \App\Models\User::find($topic->user_id)->nickname) }}" class="blog__item-author-profile author-profile">
                                        {{'@' . \App\Models\User::find($topic->user_id)->nickname }}
                                    </a>
                                </div>
                                <div class="blog__item-public">
                                    Public: {{ $topic->created_at }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $topics->links() }}
        </div>
    </section>
@endsection

