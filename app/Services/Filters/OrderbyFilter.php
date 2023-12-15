<?php


namespace App\Services\Filters;


use App\Models\Product;

class OrderbyFilter
{

    public function newest()
    {
            return Product::orderBy('desc','created_at')->get();
    }
}
