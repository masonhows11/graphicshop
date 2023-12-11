<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\image\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{


    public function create()
    {
        $categories = Category::select('title', 'id')->get();
        return view('admin.product.create', ['categories' => $categories]);
    }

    public function store(ProductStoreRequest $request)
    {
        try {

            $user = User::first();
            $updated = null;


            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'price' => $request->price,
                'user_id' => $user->id,
            ]);

            $product->categories()->sync($request->categories);

            // for upload file
            $basPath = 'products/' . $product->id . '/';
            $sourceImagePath = $basPath . 'source_url' . $request->source_url->getClientOriginalName();

            $images = [
                'thumbnail_path' => $request->thumbnail_path,
                'demo_url' => $request->demo_url,
            ];

            $images_path = ImageUploader::uploadMany($images, $basPath);
            ImageUploader::upload($request->source_url, $sourceImagePath, 'local_storage');

            $updated = $product->update([
                'thumbnail_path' => $images_path['thumbnail_path'],
                'demo_url' => $images_path['demo_url'],
                'source_url' => $sourceImagePath,
            ]);

            if (!$updated) {
                session()->flash('warning', __('messages.An_error_occurred_while_uploading_images'));
                return redirect()->back();
            }


            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('admin.product.index');
        } catch (\Exception $ex) {
            session()->flash('warning', $ex->getMessage());
            return redirect()->back();
        }
    }


    public function edit(Request $request)
    {
        return view('admin.product.edit');
    }

    public function update(ProductUpdateRequest $request)
    {
        try {

        } catch (\Exception $ex) {

        }
    }


}
