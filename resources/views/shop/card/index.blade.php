@extends('layout.main-layout')

@section('title', 'Card')

@section('content')
    <section class="card">
        <div class="container">
            <div class="blog__title">
                Card
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
                                <div class="card__setting">
                                    <a class="setting__card" title="Удалить" href="{{ route('shop.card.delete', $product->id) }}">
                                        <img src="https://img.icons8.com/ios/32/000000/delete--v1.png"/>
                                    </a>
                                </div>
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
                                <div class="card__amount" title="Количество">
                                    <form action="{{ route('shop.card.update', $product->id) }}" method="post" autocomplete="off" class="card__form">
                                        @csrf
                                        <input type="number" min="1" onchange="priceChange(this)" max="{{ \App\Models\Shop\Product::whereId($product->product_id)->first()->amount }}" name="amount" class="card__input" value="{{ $product->amount }}">
                                        <input type="submit" value=" " class="card-btn">
                                    </form>
                                </div>
                            </div>
                            <div class="card__price"e>
                                {{ $product->total_price }}$
                            </div>
                            <a href="{{ route("shop.product.show", $product->product_id) }}" class="card__item-link">

                            </a>
                        </div>
                    @endforeach
                        @if(!empty($products[0]))
                            <div class="card__total">
                                <div class="card__header">
                                    <div class="card__total-title">
                                        Total:
                                    </div>
                                </div>
                                <div class="card__price">
                                    {{ $products->sum('total_price') }}$
                                </div>
                                <form action="{{ route('shop.order.store') }}" method="post"  class="card-order__form">
                                    @csrf
                                    <label class="card__label">
                                        <div class="label-text">
                                            Enter address
                                        </div>
                                        <input type="text" name="address" class="order__input" value="{{ old('address') }}">
                                        @error('address')
                                             <div class="form_error-msg">{{ $message }}</div>
                                        @enderror
                                    </label>
                                    <input type="submit" value="Order"  class="order__btn"
                                           @if ($products->sum('total_price') > \App\Models\Profile\Balance::whereUserId(Auth::id())->first()->balance)
                                                disabled title="Недостаточно средств для покупки"
                                           @endif
                                    >
                                </form>
                            </div>
                        @else
                            <div class="empty">
                                Card empty
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </section>
@endsection
