@extends('layout.main-layout')

@section('title', 'Category')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Category
            </div>
            <div class="category__inner">
                @include('layout.shopMenu')
                <div class="category__list">
                    @foreach($categories as $category)
                        <div class="category__item">
                            <div class="category__item-title">
                                <a href="{{ route('shop.category.show', $category->id) }}" class="category__title-link">
                                    {{ strip_tags($category['title']) }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
