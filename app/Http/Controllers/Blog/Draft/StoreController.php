<?php

namespace App\Http\Controllers\Blog\Draft;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\MyBlog\PostRequest;
use App\Models\Blog\Post;

class StoreController extends Controller
{
    public function __invoke(PostRequest $request)
    {
        $validateFields = $request->validated();
        $validateFields['user_id'] = \Auth::id();
        $validateFields['published'] = false;

        $post = Post::create($validateFields);

        return redirect(route('blog.myblog.index'));
    }
}
