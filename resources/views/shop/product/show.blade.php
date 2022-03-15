@extends('layout.main-layout')

@section('title', $product->title)

@section('content')
    <section class="card">
        <div class="container">
            <div class="blog__title">
                {{ $product->title }}
            </div>
            <div class="product__inner">
                @include('layout.shopMenu')
                <div class="card__list">
                    <div class="show__item">
                        <div class="show__info">
                            <div class="show__image">
                                @if($product->file != null)
                                    <img src="{{ Storage::url($product->file) }}" alt="">
                                @else
                                    <img src="{{ asset('not-photo.jpg') }}" alt="">
                                @endif
                            </div>
                            <div class="show__inner">
                                <div class="show-inner__header">
                                    <a class="look-internet__link" href="https://www.google.com/search?q={{$product->title}}">
                                        Search on the Internet
                                    </a>
                                    <div class="product__amount">
                                        {{ $product->amount }}
                                    </div>
                                    <div class="show__setting-favorite">
                                        @include('layout.shop_favorite_icon')
                                    </div>
                                </div>
                                <div class="show__setting-add">
                                    <a href="{{ route('shop.card.store', $product->id) }}" class="setting-add__link @if ($product->user_id == Auth::id()) disable @endif">
                                        Add to Cart
                                    </a>
                                </div>
                                <div class="product__info">
                                    <div class="product__price">
                                        {{ $product->price }}$
                                    </div>
                                    @if ($product->discount > 0)
                                        <div class="product__price-discount">
                                            {{ $product->price * ((100 - $product->discount) / 100) }}$
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="show__text">
                            {!! $product->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
