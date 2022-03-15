<?php

namespace App\Http\Controllers\Forum\MyTopic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\TopicRequest;
use App\Models\Forum\Rubric;
use App\Models\Forum\Topic;
use function view;

class StoreController extends Controller
{
    public function __invoke(TopicRequest $request) {

        $data = $request->validated();
        $data['user_id'] = \Auth::id();

        Topic::create($data);
        Rubric::find($data['rubric_id'])->increment('topic_counter');

        return redirect(route('forum.mytopic.index'));
    }
}
