@extends('layout.main-layout')

@section('title', 'Blog')

@section('content')
    <section class="forum">
        <div class="container">
            <div class="blog__title">
                <div class="blog__item-name">
                    {{ strip_tags($topic->title) }}

                    <div class="topic_status">
                        @if($topic->status === 'open')
                            <img title="This topic open" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/xIl7OgcUOEmAMBKoLXA1cA/id%3DMR7Wh2bERF5j-format%3Dpng.png"/>
                        @else
                            <img title="This topic close" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/GWeG4ndTHkWsHPo46BPVBA/id%3DeIN3yzdnX3bq-format%3Dpng.png"/>
                        @endif
                    </div>
                </div>
            </div>
            <div class="blog__inner">
                @include('layout.ForumMenu')
                <div class="blog__list">
                    <div class="blog__list-item topic__list-item">
                        <div class="blog__item-name topic__item">
                            <div class="myblog_link">
                                <a class="post-category" href="{{ route('forum.rubric.show', $topic->rubric_id) }}">
                                    {{ \App\Models\Forum\Rubric::find($topic->rubric_id)->title }}
                                </a>
                                <div class="message_count">
                                    <img src="https://img.icons8.com/office/20/000000/chat-message.png"/>
                                    {{ $topic->message_counter }}
                                </div>
                                <div class="topic_status">
                                    @if (Auth::id() === $topic->user_id OR Auth::user()->role === 'admin')
                                        @if($topic->status === 'open')
                                            <a href="{{ route('forum.topic.close', $topic->id) }}">
                                                <img title="Close this topic" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/GWeG4ndTHkWsHPo46BPVBA/id%3DeIN3yzdnX3bq-format%3Dpng.png"/>
                                            </a>
                                        @else
                                            <a href="{{ route('forum.topic.open', $topic->id) }}">
                                                <img title="Open this topic" src="https://lun-eu.icons8.com/a/V8RdbZ-EZEqPJtQNGYecLA/xIl7OgcUOEmAMBKoLXA1cA/id%3DMR7Wh2bERF5j-format%3Dpng.png"/>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="topic__item-text">
                            {!! $topic->content !!}
                        </div>
                        <div class="blog__item-footer topic__item-footer">
                            <div class="blog__item-author topic__item-author">
                                <a href="{{ route('profile.index', \App\Models\User::find($topic->user_id)->nickname) }}" class="blog__item-author-profile author-profile">
                                    {{'@' . \App\Models\User::find($topic->user_id)->nickname }}
                                </a>
                            </div>
                            <div class="topic__item-public">
                                {{ $topic->created_at }}
                            </div>
                        </div>
                    </div>
                    <div class="message__list">
                        @foreach($messages as $message)
                            <div class="message_item">
                                <div class="topic__item-text">
                                    {!! $message->content !!}
                                </div>
                                <div class="topic__item-footer">
                                    <div class="topic__item-author">
                                        <a href="{{ route('profile.index', \App\Models\User::find($message->user_id)->nickname) }}" class="blog__item-author-profile author-profile">
                                            {{'@' . \App\Models\User::find($message->user_id)->nickname }}
                                        </a>
                                    </div>
                                    <div class="topic__item-public">
                                        {{ $message->created_at }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $messages->links() }}

                    @if($topic->status === 'open')
                        <form method="post" class="message_form" action="{{ route('forum.topic.store', $topic->id) }}">
                            @csrf
                            <div class="textarea-text">
                                <label class="category__lable">
                                    <div class="lable__text label-msg">
                                        Enter message
                                    </div>
                                    <textarea class="post__area" id="summernote"  name="content">
                                {{ old('content') }}
                            </textarea>
                                    @error('content')
                                    <div class="form_error-msg">{{ $message }}</div>
                                    @enderror
                                </label>
                            </div>
                            <input type="submit" value="Send" class="post-btn">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
