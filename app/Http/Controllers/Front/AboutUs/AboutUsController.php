<?php

namespace App\Http\Controllers\Front\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $categories = Category::tree()->get()->toTree();
        return view('front.about_us.about_us',[ 'categories' => $categories,]);
    }
}
