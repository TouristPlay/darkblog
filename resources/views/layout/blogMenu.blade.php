<div class="profile__nav">
    <ul class="blog__nav-list">
        <li class="blog__nav-list-item">
            <a href="{{ route('blog.posts.index') }}" class="blog__item-link">
                Posts
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('blog.myblog.index') }}" class="blog__item-link">
                MyBlog
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('blog.category.index') }}" class="blog__item-link">
                Category
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('blog.favorite.index') }}" class="blog__item-link">
                Favorite
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('blog.draft.index') }}" class="blog__item-link">
                Draft
            </a>
        </li>
        <li class="blog__nav-list-item">
            <a href="{{ route('blog.deleted.index') }}" class="blog__item-link">
                Deleted
            </a>
        </li>
    </ul>
</div>
