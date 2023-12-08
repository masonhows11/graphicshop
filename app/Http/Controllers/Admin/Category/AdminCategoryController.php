<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    //
    public function create()
    {
            $categories = Category::select('id','title')->get();
            return view('admin.category.create',['categories' => $categories]);
    }

    public function store(Request $request)
    {

    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',['category' => $category]);
    }

    public function update(Request $request)
    {

    }
}
