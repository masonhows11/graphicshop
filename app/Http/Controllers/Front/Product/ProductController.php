<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //

    public function products()
    {
        
    }

    public function show(Product $product)
    {


        return view('front.product.product');
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
