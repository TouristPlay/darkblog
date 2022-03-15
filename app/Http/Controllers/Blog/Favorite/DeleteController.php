<?php

namespace App\Http\Controllers\Blog\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Blog\FavoritePost;
use App\Models\Blog\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        $favoritePost = FavoritePost::where('user_id', \Auth::id())
            ->where('post_id', $post->id)->delete();

        $post->decrement('favorite');

        return redirect(\URL::previous());
    }
}
