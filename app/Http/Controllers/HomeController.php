<?php

namespace App\Http\Controllers;


use App\Models\Category;

class HomeController extends Controller
{
    //
    public function home()
    {
        $categories = Category::tree()->get()->toTree();
        return view('home')
            ->with(['categories' => $categories]);
    }

    public function notFound()
    {
        $categories = Category::tree()->get()->toTree();
        return view('errors_custom.404_error')->with(['categories' => $categories]);
    }
}
