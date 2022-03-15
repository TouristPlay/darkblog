@extends('layout.main-layout')

@section('title', 'Product')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                Favorite Product
            </div>
            <div class="product__inner">
                @include('layout.shopMenu')
                <div class="product__list">
                    @foreach($products as $product)
                        <div class="product__item" title="{{ $product->title }}">
                            <div class="product__item-image">
                                @if($product->file != null)
                                    <img src="{{ Storage::url($product->file) }}" alt="">
                                @else
                                    <img src="{{ asset('not-photo.jpg') }}" alt="">
                                @endif
                                <div class="product__setting">
                                    @if ($product->user_id == Auth::id())
                                        <a class="setting__card" href="{{ route('shop.mycard.edit', $product->id) }}" title="Редактировать">
                                            <img src="https://img.icons8.com/fluency-systems-regular/20/000000/edit-property.png"/>
                                        </a>
                                    @else
                                        <a class="setting__card" title="Добавить в корзину">
                                            <img src="https://img.icons8.com/dusk/32/000000/shopping-basket-2.png"/>
                                        </a>
                                    @endif
                                    <div class="setting__favorite">
                                        @include('layout.shop_favorite_icon')
                                    </div>
                                </div>
                            </div>
                            <div class="product__title">
                                {{ $product->title }}
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
                                <div class="product__amount">
                                    {{ $product->amount }}
                                </div>
                            </div>
                            <a href="{{ route("shop.product.show", $product->id) }}" class="product__item-link">

                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </section>
@endsection
