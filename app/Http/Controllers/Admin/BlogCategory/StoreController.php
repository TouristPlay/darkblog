<?php

namespace App\Http\Controllers\Admin\BlogCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Category\CategoryRequest;
use App\Models\Blog\Category;
use function redirect;

class StoreController extends Controller
{
    public function __invoke(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate(['title' => $data['title']]);
        return redirect(\URL::previous());
    }
}
