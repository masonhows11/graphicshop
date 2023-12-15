<?php


namespace App\Services\Filters;


use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderbyFilter
{

    public function newest()
    {
            return DB::table('products')->orderBy('created_at','desc')->paginate(10);
    }

    public function mostVisited()
    {
        return DB::table('products')->max('views')->paginate(10);
    }

    public function cheapest()
    {
        return DB::table('products')->min('price')->paginate(10);
    }

    public function mostExpensive(){
        return DB::table('products')->max('price')->paginate(10);
    }

    public function bestselling(){
        return DB::table('products')->max('sale')->paginate(10);
    }

}
