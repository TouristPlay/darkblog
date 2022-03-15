<div class="profile__nav">
    <ul class="blog__nav-list">
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.product.index') }}" class="blog__item-link">
                Product
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.mycard.index') }}" class="blog__item-link">
                MyCard
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.seller.index') }}" class="blog__item-link">
                Seller
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.category.index') }}" class="blog__item-link">
                Category
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.favorite.index') }}" class="blog__item-link">
                Favorite
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.card.index') }}" class="blog__item-link">
                Card<sup class="product__card-counter">{{ \App\Models\Shop\Order::whereUserId(Auth::id())->whereStatus('card')->count() }}</sup>
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('shop.order.index') }}" class="blog__item-link">
                Order
            </a>
        </li>
    </ul>
</div>
