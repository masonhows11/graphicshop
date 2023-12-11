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

            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'user_id' => $user->id,
            ]);

            $product->categories()->sync($request->categories);

            // for upload file
            $basPath = 'products/' . $product->id . '/';
            $images = [
                'thumbnail_path' => $request->thumbnail_path,
                'demo_url' => $request->demo_url,
            ];
           $images_path =  ImageUploader::uploadMany($images,$basPath);

           dd($images_path);
        } catch (\Exception $ex) {

            return $ex->getMessage();
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
