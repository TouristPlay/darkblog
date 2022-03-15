<?php

namespace App\Http\Controllers\Admin\Topics;

use App\Http\Controllers\Controller;
use App\Models\Forum\Topic;
use function view;

class IndexController extends Controller
{
    public function __invoke() {
        $topics = Topic::withTrashed()->paginate(5);
        return view('admin.topics.index', compact('topics'));
    }
}
