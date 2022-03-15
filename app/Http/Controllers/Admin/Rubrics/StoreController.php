<?php

namespace App\Http\Controllers\Admin\Rubrics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\RubricRequest;
use App\Models\Forum\Rubric;

class StoreController extends Controller
{
    public function __invoke(RubricRequest $request)
    {
        $data = $request->validated();
        Rubric::firstOrCreate($data);

        return redirect(route('admin.rubrics.index'));
    }
}
