<?php

namespace App\Http\Controllers\Blog\Posts\Author;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\User;
use function view;

class ShowController extends Controller
{
    public function __invoke($nickname) {
        $user = User::whereNickname($nickname)->first();
        $posts = Post::where('published', true)->whereUserId($user->id)->orderByDesc('created_at')->paginate(3);
        return view('blog.posts.author.show', compact('posts', 'nickname'));
    }
}
