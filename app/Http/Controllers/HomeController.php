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
        return view('home');
    }

    public function products(Request $request)
    {

    }

    public function searchCategory(Request $request)
    {

    }
}
