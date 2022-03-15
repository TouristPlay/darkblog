@extends('layout.main-layout')

@section('title', 'Product')

@section('content')
    <section class="forum">
        <div class="container">
            <div class="blog__title">
                Create Product
            </div>
            <div class="shop__inner">
                @include('layout.shopMenu')
                <form enctype="multipart/form-data" action="{{route('shop.mycard.store')}}" method="post" autocomplete="off" class="addpost__form">
                    @csrf
                    <div class="shop-form__inner">
                        <label class="shop__label">
                            <div class="label__text">
                                Enter title
                            </div>
                            <input autofocus type="text" class="shop__input" placeholder="Hack" name="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                        <label class="shop__lable">
                            <div class="label__text">
                                Choose category
                            </div>
                            <select class="post__select" name="category_id">
                                @foreach($categories as $category)
                                    <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="form_error-msg">{{ $message }}</div>
                                 @enderror
                             </div>
                        </label>
                    <label class="shop__lable">
                        <div class="lable__text">
                            Enter price
                        </div>
                        <input type="number" min="1" class="shop__input" name="price" value="{{ old('price') }}">
                        @error('price')
                        <div class="form_error-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="shop__lable">
                        <div class="lable__text">
                            Enter discount
                        </div>
                        <input type="number" max="100" min="0" class="shop__input" name="discount" value="{{ old('discount') }}">
                        @error('discount')
                            <div class="form_error-msg">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="shop__lable">
                        <div class="lable__text">
                            Enter amount
                        </div>
                        <input type="number" min="1" class="shop__input" name="amount" value="{{ old('amount') }}">
                        @error('amount')
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
                    <div class="shop-file__inner">
                        <label class="shop__label">
                            <div class="label__text">
                                Choose photo
                            </div>
                            <input type="file" class="shop__input" name="file" value="{{ old('file') }}">
                            @error('file')
                            <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <input type="submit" name="create"  class="post-btn" value="Create">
                </form>
            </div>
        </div>
    </section>
@endsection
