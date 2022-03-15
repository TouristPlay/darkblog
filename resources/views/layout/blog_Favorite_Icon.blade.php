@if (!(\App\Models\Blog\FavoritePost::where('user_id', Auth::id())->where('post_id', $post->id)->get()->isEmpty()))
    <a title="Favorite: {{ \App\Models\Blog\Post::find($post->id)->favorite }}" class="blog__item-favorite-btn " href="{{ route('blog.favorite.delete', $post->id) }}">
        <img src="https://img.icons8.com/plasticine/32/000000/fire-heart.png"  class="favorite-img">
    </a>
@else
    <a title="Favorite: {{ \App\Models\Blog\Post::find($post->id)->favorite }}" class="blog__item-favorite-btn" href="{{ route('blog.favorite.create', $post->id) }}">
        <img src="https://img.icons8.com/carbon-copy/32/000000/fire-heart.png"  class="favorite-img">
    </a>
@endif
