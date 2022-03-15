@extends('layout.main-layout')

@section('title', 'Seller')

@section('content')
    <section class="seller">
        <div class="container">
            <div class="blog__title">
                Seller
            </div>
            <div class="product__inner">
                @include('layout.shopMenu')
                <div class="card__list">
                    @foreach($products as $product)
                        <div class="card__item" title="{{ $product->title }}">
                            <div class="card__item-image">
                                @if (\App\Models\Shop\Product::whereId($product->product_id)->first()->file != null)
                                    <img src="{{ Storage::url(\App\Models\Shop\Product::whereId($product->product_id)->first()->file) }}" alt="Фото продукта">
                                @else
                                    <img src="{{ asset('not-photo.jpg') }}" alt="Фото продукта">
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
                                <form action="{{ route('shop.seller.update', $product->id) }}" method="post" class="seller__status" >
                                    @csrf
                                    <select class="seller__select" name="status">
                                        <option value="{{ $product->status }}">{{ $product->status }}</option>
                                        <option value="On confirmation">On confirmation</option>
                                        <option value="Order is accepted">Order is accepted</option>
                                        <option value="Order collected">Order collected</option>
                                        <option value="Order sent">Order sent</option>
                                        <option value="Order arrived">Order arrived</option>
                                        <option value="Completed">Completed</option>
                                    </select>

                                    <input type="submit" value=" " class="seller-btn" title="Обновить статус">
                                </form>
                            </div>
                            <div class="card__amount">
                                {{ $product->amount }}
                            </div>
                            <div class="card__price">
                                {{ $product->total_price }}$
                            </div>
                            <a href="{{ route("shop.product.show", $product->product_id) }}" class="card__item-link" title="{{ $product->address }}">

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
