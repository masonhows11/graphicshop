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
        return DB::table('products')->orderBy('views','desc')->paginate(10);
    }

    public function lowToHigh()
    {
        return DB::table('products')->orderBy('price','asc')->paginate(10);
    }

    public function highToLow()
    {
        return DB::table('products')->orderBy('price','desc')->paginate(10);
    }

    public function bestselling(){
        return DB::table('products')->orderBy('sale','desc')->paginate(10);
    }

}
