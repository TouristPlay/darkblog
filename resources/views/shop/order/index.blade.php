@extends('layout.main-layout')

@section('title', 'Order')

@section('content')
    <section class="order">
        <div class="container">
            <div class="blog__title">
                Order
            </div>
            <div class="product__inner">
                @include('layout.shopMenu')
                <div class="card__list">
                    @foreach($products as $product)
                        <div class="card__item" title="{{ $product->title }}">
                            <div class="card__item-image">
                                <img src="
                                    @if (\App\Models\Shop\Product::whereId($product->product_id)->first()->file != null)
                                         {{ Storage::url(\App\Models\Shop\Product::whereId($product->product_id)->first()->file) }}
                                    @else
                                        {{ asset('not-photo.jpg') }}
                                    @endif" alt="Фото продукта">
                                @if($product->status != 'Completed')
                                    <div class="card__setting">
                                        <a class="setting__card" title="Отменить заказ" href="{{ route('shop.order.delete', $product->id) }}">
                                            <img src="https://img.icons8.com/glyph-neue/32/000000/undo.png"/>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="card__header">
                                <div class="card__text">
                                    <div class="card__title">
                                        {{ \App\Models\Shop\Product::whereId($product->product_id)->first()->title }}
                                    </div>
                                    <div class="card__description">
                                        {!! \App\Models\Shop\Product::whereId($product->product_id)->first()->content !!}
                                    </div>
                                </div>
                                <div class="card__status">
                                    {{ $product->status }}
                                </div>
                                <div class="card__amount" title="Количество">
                                   {{ $product->amount }}
                                </div>
                            </div>
                            <div class="card__price">
                                {{ $product->total_price }}$
                            </div>
                            <a href="" class="card__item-link" title="{{ $product->address }}">

                            </a>
                        </div>
                    @endforeach
                        @if(empty($products[0]))
                            <div class="empty">
                                Order empty
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </section>
@endsection
