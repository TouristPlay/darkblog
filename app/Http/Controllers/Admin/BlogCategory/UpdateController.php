<?php

namespace App\Http\Controllers\Admin\BlogCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Category\CategoryRequest;
use App\Models\Blog\Category;


class UpdateController extends Controller
{
    public function __invoke(Category $category, CategoryRequest $request)
    {
       $data = $request->validated();
       $category->update($data);

       return redirect(route('admin.categories.index'));
    }
}
