<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\image\ImageUploader;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;


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
                'seo_desc' => $request->seo_desc,
                'product_tags' => $request->product_tags,
                'status' => $request->status,
                'price' => $request->price,
                'user_id' => $user->id,
            ]);
            $product->categories()->sync($request->categories);

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


    public function edit(Product $product)
    {
        $categories = Category::select('title', 'id')->get();
        foreach ($product->categories as $cat) {
            $category_ids[] = $cat->id;
        }
        return view('admin.product.edit')
            ->with(['product' => $product,'categories' => $categories,'category_ids' => $category_ids]);
    }

    public function update(ProductUpdateRequest $request)
    {
        try {

            dd($request);
            $user = User::first();
            $updated = null;

            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'seo_desc' => $request->seo_desc,
                'product_tags' => $request->product_tags,
                'status' => $request->status,
                'price' => $request->price,
                'user_id' => $user->id,
            ]);
            $product->categories()->sync($request->categories);
            // for upload file
            if($request->hasFile('thumbnail_path')){

            }
            if($request->hasFile('demo_url')){

            }
            if($request->hasFile('source_url')){

            }
            

            if (!$updated) {
                session()->flash('warning', __('messages.An_error_occurred_while_uploading_images'));
                return redirect()->back();
            }


            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('admin.product.index');

        } catch (\Exception $ex) {

        }
    }

    public function downloadDemoFile($id)
    {
        try {
            $product = Product::findOrfail($id);
            return  response()->download(public_path($product->demo_url));
        }catch (\Exception $ex){
            return view('errors_custom.404_error');
        }

    }

    public function downloadSourceFile($id)
    {
        try {
            $product = Product::findOrfail($id);
           // dd(storage_path('app/local_storage/'.$product->source_url));
            return  response()->download(storage_path('app/local_storage/'.$product->source_url));
        }catch (\Exception $ex){
            return view('errors_custom.404_error');
        }
    }

    private function uploadImages($createdProduct,$validateData)
    {
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

    }

}
