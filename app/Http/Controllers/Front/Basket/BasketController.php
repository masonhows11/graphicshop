<?php

namespace App\Http\Controllers\Front\Basket;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{


    public function cartCheck()
    {
        $categories = Category::tree()->get()->toTree();
        return view('front.cart.cart')->with(['categories' => $categories]);
    }

    public function addToBasket(Request $request)
    {

    }

    public function removeFromBasket(Request $request)
    {

    }
}
