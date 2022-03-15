<?php

namespace App\Http\Controllers\Blog\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Blog\FavoritePost;
use App\Models\Blog\Post;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $favoritePostID = FavoritePost::where('user_id', \Auth::id())->get('post_id');

        $posts = Post::whereIn('id',$favoritePostID)->orderByDesc('created_at')->paginate(3);

        return view('blog.favorite.index', compact('posts'));
    }
}
