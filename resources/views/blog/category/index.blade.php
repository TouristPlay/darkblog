@extends('layout.main-layout')

@section('title', 'Category')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Category
                @can('view', auth()->user())
                    <a href="{{ route('admin.categories.create') }}" class="create-btn">
                        Create
                    </a>
                @endcan
            </div>
            <div class="category__inner">
                @include('layout.blogMenu')
                <div class="category__list">
                    @foreach($categories as $category)
                        <div class="category__item">
                            <div class="category__item-title">
                                <a href="{{ route('blog.category.show', $category->id) }}" class="category__title-link">
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
