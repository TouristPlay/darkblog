@if (!(\App\Models\Shop\FavoriteProduct::where('user_id', Auth::id())->where('product_id', $product->id)->get()->isEmpty()))
    <a title="Favorite: {{ $product->favorite_counter }}" class="shop__item-favorite-btn " href="{{ route('shop.favorite.delete', $product->id) }}">
        <img src="https://img.icons8.com/plasticine/32/000000/fire-heart.png"  class="favorite-img">
    </a>
@else
    <a title="Favorite: {{ $product->favorite_counter }}" class="shop__item-favorite-btn" href="{{ route('shop.favorite.create', $product->id) }}">
        <img src="https://img.icons8.com/carbon-copy/32/000000/fire-heart.png"  class="favorite-img">
    </a>
@endif
