<?php


namespace App\Services\Filters;


use App\Models\Product;

class OrderbyFilter
{

    public function newest()
    {
            return Product::orderBy('created_at','desc')->paginate(10)   ;
    }
}
