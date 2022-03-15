<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Forum\Topic;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Topic $topic)
    {
        $topic->restore();
        return redirect(route('admin.topics.index'));
    }
}
