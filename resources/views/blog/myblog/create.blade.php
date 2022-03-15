@extends('layout.main-layout')

@section('title', 'Create post')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Create post
            </div>
            <div class="blog__inner">
                @include('layout.blogMenu')
                <form method="post" autocomplete="off" class="addpost__form">
                    @csrf
                    <label class="category__lable">
                        <div class="lable__text">
                            Enter title
                        </div>
                        <input autofocus type="text" class="post__input" placeholder="Hack" name="title" value="{{ old('title') }}">
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
                                {{ old('content') }}
                            </textarea>
                            @error('content')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <input type="submit" name="create" formaction="{{ route('blog.myblog.store') }}" class="post-btn" value="Create">
                    <input type="submit" name="draft" formaction="{{ route('blog.draft.store') }}" class="post-btn" value="Save Draft">
                </form>
            </div>
        </div>
    </section>
@endsection
