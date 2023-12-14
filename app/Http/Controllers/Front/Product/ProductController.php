<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //

    public function products(Request $request)
    {

    }

    public function searchCategory(Request $request)
    {
        return view('front.product.category_products');
    }

    public function show(Product $product)
    {
        $categories = Category::tree()->get()->toTree();
        $relatedProducts = Product::where('category_id',$product->category_id)->take(4)->get()->except($product->id);
        //->except('id',$product->id);
        return view('front.product.product')
            ->with(['product' => $product,'categories' => $categories ,'relatedProducts' => $relatedProducts]);
    }

    public function addToFavoriteProducts(Request $request)
    {

        $product = Product::findOrFail($request->product);
        if (Auth::check()) {
            $product->user()->toggle([Auth::id()]);
            if ($product->user->contains(Auth::id())) {
                return response()->json(['status' => 1], 200);
            } else {
                return response()->json(['status' => 2], 200);
            }
        } else {
            return response()->json(['status' => 3], 200);
        }
    }

    public function addToCompareProducts(Request $request)
    {

        $product = Product::findOrFail($request->product);
        if (Auth::check()) {
            $user = Auth::user();
            if($user->compare()->count() > 0){
                $userCompareList  = $user->compare;
            }else{
                $userCompareList = Compare::create(['user_id' => $user->id]);
            }
            $product->compares()->toggle([$userCompareList->id]);
            if ($product->compares->contains($userCompareList->id)) {
                return response()->json(['status' => 1], 200);
            } else {
                return response()->json(['status' => 2], 200);
            }
        } else {
            return response()->json(['status' => 3], 200);
        }
    }


}
