@extends('layout.main-layout')

@section('title', 'Create Topic')

@section('content')
    <section class="forum">
        <div class="container">
            <div class="blog__title">
                Create topic
            </div>
            <div class="blog__inner">
                @include('layout.ForumMenu')
                <form method="post" action="{{ route('forum.mytopic.store') }}" autocomplete="off" class="addpost__form">
                    @csrf
                    <label class="category__lable">
                        <div class="lable__text">
                            Enter title
                        </div>
                        <input autofocus type="text" class="post__input topic_input" placeholder="Hack" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="form_error-msg topic-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="category__lable">
                        <div class="lable__text">
                            Choose rubric
                        </div>
                        <select class="post__select" name="rubric_id">
                            @foreach($rubrics as $rubric)
                                <option @if(old('rubric_id') == $rubric->id) selected @endif value="{{ $rubric->id }}">
                                    {{ $rubric->title }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <div class="textarea-text">
                        <label class="category__lable">
                            <div class="lable__text">
                                Enter description
                            </div>
                            <textarea class="post__area" id="summernote"  name="content">
                                {{ old('content') }}
                            </textarea>
                            @error('content')
                                <div class="form_error-msg topic-msg">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <input type="submit" name="create" class="post-btn forum-btn" value="Public">
                </form>
            </div>
        </div>
    </section>
@endsection
