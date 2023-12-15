<?php


namespace App\Services\Filters;


use App\Models\Product;

class PriceFilter
{

    public function price_filter($request)
    {
        $result = null;
        if ($request->min_price && $request->max_price) {
            $result = Product::whereBetween('price', [$request->min_price, $request->max_price])->paginate(3);
        } elseif ($request->min_price) {
            $result = Product::where('price', '>=', $request->min_price)->paginate(3);
        } elseif ($request->max_price) {
            $result = Product::where('price', '<=', $request->max_price)->paginate(3);
        } else {
            $result = Product::paginate(10);
        }
        /* $query = $products;
         $products = $request->min_price && $request->max_price ?

             $query->whereBetween('price', [$request->min_price, $request->max_price]) :

             $query->when($request->min_price, function ($query) use ($request) {
                 $query->where('price', '>=', $request->min_price)->get();
             })->when($request->max_price, function ($query) use ($request) {
                 $query->where('price', '<=', $request->max_price)->get();
             })->when(!($request->min_price && $request->max_price), function ($query) {
                 $query->get();
             });*/

        return $result->appends($request->query());
    }

}
