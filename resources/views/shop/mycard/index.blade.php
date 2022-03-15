@extends('layout.main-layout')

@section('title', 'My Card')

@section('content')
    <section class="blog">
        <div class="container">
            <div class="blog__title">
                My Card
                <a href="{{ route('shop.mycard.create') }}" class="create-btn">
                    Create
                </a>
            </div>
            <div class="product__inner">
                @include('layout.shopMenu')
                <div class="product__list">
                    @foreach($products as $product)
                        <div class="product__item" title="{{ $product->title }}">
                            <div class="product__item-image">
                                <img src="
                                    @if ($product->file != null)
                                        {{ Storage::url($product->file) }}
                                    @else
                                        {{ asset('not-photo.jpg') }}
                                    @endif" alt="Фото продукта">
                                <div class="product__setting">
                                    <a class="setting__card" title="Редактировать" href="{{ route('shop.mycard.edit', $product->id) }}">
                                        <img src="https://img.icons8.com/fluency-systems-regular/20/000000/edit-property.png"/>
                                    </a>
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
