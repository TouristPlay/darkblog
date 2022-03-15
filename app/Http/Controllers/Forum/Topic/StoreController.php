<?php

namespace App\Http\Controllers\Forum\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\MessageRequest;
use App\Models\Forum\Message;
use App\Models\Forum\Topic;
use Illuminate\Support\Facades\Request;
use function view;

class StoreController extends Controller
{
    public function __invoke(MessageRequest $request, Topic $topic) {

        $data = $request->validated();
        $data['user_id'] = \Auth::id();
        $data['topic_id'] = $topic->id;

        $topic->increment('message_counter');

        Message::create($data);

        return redirect(\URL::previous());
    }
}
