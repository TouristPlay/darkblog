<?php

namespace App\Http\Controllers\Blog\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Blog\FavoritePost;
use App\Models\Blog\Post;

class CreateController extends Controller
{
    public function __invoke(Post $post)
    {
        $field = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id
        ];

        $post->increment('favorite');

        FavoritePost::firstOrCreate($field);
        return redirect(\URL::previous());
    }
}
