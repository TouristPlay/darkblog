@extends('layout.main-layout')

@section('title', 'Add post')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Create category
            </div>
            <div class="category__inner">
                @include('layout.blogMenu')
                <form action="{{ route('admin.categories.store') }}" method="post" autocomplete="off" class="addcategory__form">
                    @csrf
                    <label class="category__lable">
                        <div class="lable__text">
                            Enter category
                        </div>
                        <input autofocus type="text" class="category__input" placeholder="Hack" name="title">
                        @error('title')
                            <div class="form_error-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <input type="submit" class="category-btn" value="Create">
                </form>
            </div>
        </div>
    </section>
@endsection
