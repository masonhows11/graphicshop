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
        $categories = Category::select('id', 'title')->get();
        return view('admin.category.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'unique:categories', 'min:2', 'max:30'],
            'slug' => ['required', 'min:2', 'max:30'],
            'status' => ['required'],
            'avatar_remove' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1999'],
        ]);

        try {

            $category = new Category();

            if ($request->hasFile('image_path')) {
                $imageSave = new ImageServiceSave();
                $image_path = $imageSave->customSavePublicPath($request->image_path, 'category');
                $category->image_path = $image_path;

            }

            if ($request->has('parent')) {
                $category->parent_id = $request->parent;
            }
            $category->title = $request->title;
            $category->status = $request->status;
            $category->slug = $request->slug;

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
        $categories = Category::select('id', 'title')->get();
        return view('admin.category.edit', ['category' => $category, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
       // dd($request);
        $request->validate([
            'title' => ['required', 'min:2', 'max:30'],
            'slug' => ['required', 'min:2', 'max:30'],
            'status' => ['required'],
            'avatar_remove' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:1999'],
        ]);

        try {

            //dd($request->image_path);
            $category = Category::findOrFail($request->id);

            if ($request->hasFile('image_path')) {
                // dd($request->image_path );
                if ($category->image_path != null) {
                    ImageServiceSave::deleteOldPublicImage($category->image_path);
                    $imageSave = new ImageServiceSave();
                    $image_path = $imageSave->customSavePublicPath($request->image_path, 'category');
                    $category->image_path = $image_path;
                }
                $imageSave = new ImageServiceSave();
                $image_path = $imageSave->customSavePublicPath($request->image_path, 'category');
                $category->image_path = $image_path;
            }

            if ($request->has('parent')) {
                $category->parent_id = $request->parent;
            }

            $category->title = $request->title;
            $category->status = $request->status;
            $category->slug = $request->slug;

            $category->save();
            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('admin.category.index');
        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error');
        }

    }
}
