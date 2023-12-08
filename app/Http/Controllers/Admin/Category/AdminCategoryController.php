<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'title' => ['required','exists:title','min:2', 'max:30'],
            'slug' => ['required','min:2', 'max:30'],
            'status' => ['required'],
            'image_path' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1999'],
        ]);

        try {

            $category = new Category();

            if ($request->hasFile('image_path')) {
                $image_extension = $request->image_path->getClientOriginalExtension();
                // create image name
                $path = 'UIMG' . '_' . date('YmdHis') . '_' . uniqid('img', true) . '.' . $image_extension;
                // save image with given name
                $request->image_path->storeAs('images/category/', $path, 'public');
                $category->image_path = $path;
            }

            if ($this->parent != null) {
                $category->title = $request->title;
                $category->status = $request->status;
                $category->slug = $request->slug;
                $category->parent_id = $request->parent;
            } else {
                $category->title = $request->title;
                $category->slug = $request->slug;
                $category->status = $request->status;
            }
            $category->save();
            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('admin.category.index');
        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error');
        }



    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',['category' => $category]);
    }

    public function update(Request $request)
    {

    }
}
