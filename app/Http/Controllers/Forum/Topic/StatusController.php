<?php

namespace App\Http\Controllers\Forum\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\MessageRequest;
use App\Models\Forum\Message;
use App\Models\Forum\Topic;
use Illuminate\Support\Facades\Request;
use function view;

class StatusController extends Controller
{

    public function close(Topic $topic) {

        if (\Auth::id() == $topic->user_id OR \Auth::user()->role === 'admin') {
            $topic->update(['status' => 'close']);
        }

        return redirect(\URL::previous());
    }

    public function open(Topic $topic) {

        if (\Auth::id() == $topic->user_id OR \Auth::user()->role === 'admin') {
            $topic->update(['status' => 'open']);
        }

        return redirect(\URL::previous());
    }

}
