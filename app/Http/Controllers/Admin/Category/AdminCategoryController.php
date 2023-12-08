<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\image\ImageServiceSave;
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
            'title' => ['required','unique:categories','min:2', 'max:30'],
            'slug' => ['required','min:2', 'max:30'],
            'status' => ['required'],
            'avatar_remove' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1999'],
        ]);

        try {

            $category = new Category();

            if ($request->hasFile('avatar_remove')) {
                $imageSave = new ImageServiceSave();
                $image_path =  $imageSave->customSavePublicPath($request->avatar_remove,'category');
                $category->image_path = $image_path;

            }

            if ($request->has('parent')) {
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

    public function edit(Request $request)
    {

        $category = Category::findOrFail($request->id);
        $categories = Category::select('id','title')->get();
        return view('admin.category.edit',['category' => $category,'categories' => $categories]);
    }

    public function update(Request $request)
    {
        //dd($request->avatar_remove);
        $request->validate([
            'title' => ['required','unique:categories','min:2', 'max:30'],
            'slug' => ['required','min:2', 'max:30'],
            'status' => ['required'],
            'avatar_remove' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1999'],
        ]);

        try {

            $category = new Category();

            if ($request->hasFile('avatar_remove'))
            {
                ImageServiceSave::deleteOldPublicImage($category->avatar_remove);
                $imageSave = new ImageServiceSave();
                $image_path =  $imageSave->customSavePublicPath($request->avatar_remove,'category');
                $category->image_path = $image_path;

            }

            if ($request->has('parent'))
            {
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
}
