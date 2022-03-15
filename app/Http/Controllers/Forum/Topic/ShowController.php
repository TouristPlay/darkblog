<?php

namespace App\Http\Controllers\Forum\Topic;

use App\Http\Controllers\Controller;
use App\Models\Forum\Message;
use App\Models\Forum\Topic;
use Illuminate\Support\Facades\Request;
use function view;

class ShowController extends Controller
{
    public function __invoke(Topic $topic) {
        $messages = Message::whereTopicId($topic->id)->paginate(5);
        return view('forum.topic.show', compact('topic', 'messages'));
    }
}
