@extends('layout.main-layout')

@section('title', 'Add post')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Update: <span>{{ $post->title }}</span>
            </div>
            <div class="blog__inner">
                @include('layout.blogMenu')
                <form action="{{ route('blog.myblog.update', $post->id) }}" method="post" autocomplete="off" class="addpost__form">
                    @csrf
                    <label class="category__lable">
                        <div class="lable__text">
                            Enter title
                        </div>
                        <input type="text" class="post__input"  name="title" value="{{ $post->title }}">
                        @error('title')
                            <div class="form_error-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="category__lable">
                        <div class="lable__text">
                            Choose category
                        </div>
                        <select class="post__select" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="form_error-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <div class="textarea-text">
                        <label class="category__lable">
                            <div class="lable__text">
                                Enter description
                            </div>
                            <textarea class="post__area" id="summernote"  name="content">
                                {!! $post->content !!}
                            </textarea>
                            @error('content')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <input type="submit" class="post-btn" value="Update">
                </form>
            </div>
        </div>
    </section>
@endsection
