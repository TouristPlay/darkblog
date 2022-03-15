@extends('layout.main-layout')

@section('title', 'MyBlog')

@section('content')
    <section class="forum">
        <div class="container">
            <div class="blog__title">
                My Topics
                <a href="{{ route('forum.mytopic.create') }}" class="create-btn">
                    Create
                </a>
            </div>
            <div class="blog__inner">
                @include('layout.ForumMenu')
                <div class="blog__list">
                    @foreach($topics as $topic)
                        <div class="blog__list-item topic__list-item">
                            <div class="blog__item-name topic__item-name">
                                <a href="{{ route('forum.topic.show', $topic->id) }}" class="post-title">
                                    {{ strip_tags($topic->title) }}
                                    <div class="topic_status">
                                        @if($topic->status === 'open')
                                            <img title="This topic open" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/xIl7OgcUOEmAMBKoLXA1cA/id%3DMR7Wh2bERF5j-format%3Dpng.png"/>
                                        @else
                                            <img title="This topic close" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/GWeG4ndTHkWsHPo46BPVBA/id%3DeIN3yzdnX3bq-format%3Dpng.png"/>
                                        @endif
                                    </div>
                                </a>
                                <div class="myblog_link">
                                    <a class="post-category" href="{{ route('forum.topic.show', $topic->rubric_id) }}">
                                        {{ \App\Models\Forum\Rubric::find($topic->rubric_id)->title }}
                                    </a>
                                    <div class="message_count">
                                        <img src="https://img.icons8.com/office/20/000000/chat-message.png"/>
                                        {{ $topic->message_counter }}
                                    </div>
                                </div>
                            </div>
                            <div class="blog__item-footer topic__item-footer">
                                <div class="blog__item-author">
                                    <a href="{{ route('profile.index', \App\Models\User::find($topic->user_id)->nickname) }}" class="blog__item-author-profile">
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

