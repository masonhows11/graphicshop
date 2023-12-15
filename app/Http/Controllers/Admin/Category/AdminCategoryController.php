<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Category\EditCategoryRequest;

use App\Models\Category;
use App\Services\Image\ImageServiceSave;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    //
    public function create()
    {
        $categories = Category::select('id', 'title')->get();
        return view('admin.category.create', ['categories' => $categories]);
    }

    public function store(CreateCategoryRequest $request)
    {
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

    public function update(EditCategoryRequest $request)
    {
        $category = Category::findOrFail($request->id);
        try {

            if ($request->hasFile('image_path')) {
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
