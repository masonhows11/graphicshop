<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\Image\ImageUploader;
use Illuminate\Support\Facades\Storage;

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

            $validatedData = $request->validated();
            $user = User::first();
            $updated = null;

            $product = Product::create([
                'title' => $request->title,
                'description' => $request->description,
                'seo_desc' => $request->seo_desc,
                'product_tags' => $request->product_tags,
                'category_id' => $request->categories,
                'status' => $request->status,
                'price' => $request->price,
                'user_id' => $user->id,
            ]);
            // $product->categories()->sync($request->categories);

            if (!$this->uploadImages($product, $validatedData)) {
                session()->flash('warning', __('messages.An_error_occurred_while_created'));
                return redirect()->back();
            }
            session()->flash('success', __('messages.New_record_saved_successfully'));
            return redirect()->route('admin.product.index');

        } catch (\Exception $ex) {
            session()->flash('warning', __('messages.An_error_occurred_while_created'));
            return redirect()->back();
        }
    }


    public function edit(Product $product)
    {
        $categories = Category::select('title', 'id')->get();
        $category_ids = [];
        foreach ($categories as $cat) {
            $category_ids[] += $cat->id;
        }
        //  dd($category_ids);
        return view('admin.product.edit')
            ->with(['product' => $product,
                'categories' => $categories,
                'category_ids' => $category_ids]);
    }

    public function update(ProductUpdateRequest $request)
    {
        try {

            $validatedData = $request->validated();
            $user = User::first();


            $product = Product::find($request->product);
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->categories,
                'seo_desc' => $request->seo_desc,
                'product_tags' => $request->product_tags,
                'status' => $request->status,
                'price' => $request->price,
                'user_id' => $user->id,
            ]);
            // $product->categories()->sync($request->categories);

            if (!$this->uploadImages($product, $validatedData)) {
                session()->flash('warning', __('messages.An_error_occurred_while_updated'));
                return redirect()->back();
            }

            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            return redirect()->route('admin.product.index');


        } catch (\Exception $ex) {
            session()->flash('warning', __('messages.An_error_occurred_while_updated'));
            return redirect()->back();
        }
    }

    public function downloadDemoFile($id)
    {
        try {
            $product = Product::findOrfail($id);
            if($product->demo_url != null ){
                if(Storage::disk('public')->exists($product->demo_url))
                {
                    return response()->download(storage_path('app/public/' . $product->demo_url));
                }
                session()->flash('warning', __('messages.file_does_not_exists'));
                return redirect()->route('admin.product.index');
            }
            session()->flash('warning', __('messages.file_does_not_exists'));
            return redirect()->route('admin.product.index');

        } catch (\Exception $ex) {
            session()->flash('error', __('messages.file_does_not_exists'));
            return redirect()->back();
        }

    }

    public function downloadSourceFile($id)
    {
        try {
            $product = Product::findOrfail($id);
            if($product->source_url != null ){
                if (Storage::disk('local_storage')->exists( $product->source_url)) {
                    return response()
                        ->download(storage_path('/app/local_storage/' . $product->source_url));
                }
            }
            session()->flash('warning', __('messages.file_does_not_exists'));
            return redirect()->route('admin.product.index');

        } catch (\Exception $ex) {
            session()->flash('error', __('messages.file_does_not_exists'));
            return redirect()->back();
        }
    }

    private function uploadImages($createdProduct, $validateData)
    {
        $sourceImagePath = null;
        $data = [];
        $basPath = 'products/' . $createdProduct->id . '/';

        try {

            if (isset($validateData['source_url'])) {
                $sourceImagePath = $basPath . 'source_url_' . $validateData['source_url']->getClientOriginalName();
                ImageUploader::upload($validateData['source_url'], $sourceImagePath, 'local_storage');
                $data += ['source_url' => $sourceImagePath];
            }
            if (isset($validateData['thumbnail_path'])) {
                $full_path = $basPath . 'thumbnail_path' . '_' . $validateData['thumbnail_path']->getClientOriginalName();
                ImageUploader::upload($validateData['thumbnail_path'], $full_path, 'public');
                $data += ['thumbnail_path' => $full_path];

            }
            if (isset($validateData['demo_url'])) {
                $full_path = $basPath . 'demo_url' . '_' . $validateData['demo_url']->getClientOriginalName();
                ImageUploader::upload($validateData['demo_url'], $full_path, 'public');
                $data += ['demo_url' => $full_path];

            }
            $updated = $createdProduct->update($data);
            if (!$updated) {
                session()->flash('warning', __('messages.An_error_occurred_while_uploading_images'));
                return redirect()->back();
            }
            return true;
            //            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            //            return redirect()->route('admin.product.index');
        } catch (\Exception $ex) {
            return false;
        }

    }

}
