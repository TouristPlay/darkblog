@extends('layout.main-layout')

@section('title', 'Rubric')

@section('content')
    <section class="forum">
        <div class="container">
            <div class="blog__title">
                Rubric
            </div>
            <div class="category__inner">
                @include('layout.ForumMenu')
                <div class="category__list">
                    @foreach($rubrics as $rubric)
                        <div class="category__item">
                            <div class="category__item-title">
                                <a href="{{ route('forum.rubric.show', $rubric->id) }}" class="category__title-link">
                                    {{ strip_tags($rubric['title']) }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
