<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Filters\PriceFilter;

class ProductController extends Controller
{
    //

    public function searchProducts(Request $request)
    {
        $products = null;
        $prices = collect(Product::select('price')->get());
        $max_price = $prices->max(['price']);
        $min_price = $prices->min(['price']);


        if (isset($request->min_price, $request->max_price)) {
            $priceFilter = new PriceFilter();
            $products = $priceFilter->price_filter($request);
            
        } elseif (isset($request->filter, $request->action)) {
            $products = $this->findFilter($request->filter, $request->action) ?? Product::paginate(10);

        } elseif ($request->filled('search')) {
            $products = Product::where('title', 'like', '%' . $request->input('search') . '%')->paginate(10);
        } else {
            $products = Product::paginate(3);
        }

        // dd($products);
        $categories = Category::tree()->get()->toTree();
        return view('front.product.search_products')
            ->with(['products' => $products,
                'categories' => $categories,
                'min_price' => $min_price,
                'max_price' => $max_price]);
    }

    public function searchCategory(Request $request)
    {
        $categories = Category::tree()->get()->toTree();
        $category = Category::where('title', $request->slug)->select('id', 'title')->first();
        $products = Product::whereHas('category', function (Builder $query) use ($category) {
            $query->where('category_id', '=', $category->id);
        })->paginate(10);
        return view('front.product.category_products')
            ->with(['products' => $products, 'categories' => $categories]);
    }

    public function show(Product $product)
    {
        $categories = Category::tree()->get()->toTree();
        $relatedProducts = Product::where('category_id', $product->category_id)->take(4)->get()->except($product->id);
        return view('front.product.product')
            ->with(['product' => $product, 'categories' => $categories, 'relatedProducts' => $relatedProducts]);
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
            if ($user->compare()->count() > 0) {
                $userCompareList = $user->compare;
            } else {
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

    private function findFilter(string $className, string $methodName)
    {
        $baseNameSpace = 'App\Services\Filters';
        $className = $baseNameSpace . '\\' . (ucfirst($className) . 'Filter');
        if (!class_exists($className)) {
            return null;
        }
        $obj = new $className;
        if (!method_exists($obj, $methodName)) {
            return null;
        }
        // for call method defined in class
        // this syntax is very important
        return $obj->{$methodName}();


    }


}
