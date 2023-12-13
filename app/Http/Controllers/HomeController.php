<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    //
    public function home()
    {
        $categories = Category::tree()->get()->toTree();
        return view('home')
            ->with(['categories' => $categories]);
    }

    public function products(Request $request)
    {

    }

    public function searchCategory(Request $request)
    {

    }

    public function notFound()
    {
        return view('errors_custom.404_error');
    }
}
