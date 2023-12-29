<?php

namespace App\Http\Controllers\Front\ContactUs;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        $categories = Category::tree()->get()->toTree();
        return view('front.contact_us.contact_us',[ 'categories' => $categories]);
    }
}
