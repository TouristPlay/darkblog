<?php

namespace App\Http\Controllers\Admin\Rubrics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forum\RubricRequest;
use App\Models\Forum\Rubric;

class UpdateController extends Controller
{
    public function __invoke(RubricRequest $request, Rubric $rubric)
    {
        $data = $request->validated();
        $rubric->update($data);
        return redirect(route('admin.rubrics.index'));
    }
}
