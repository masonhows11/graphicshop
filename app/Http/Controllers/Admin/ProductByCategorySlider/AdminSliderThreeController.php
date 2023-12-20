<?php

namespace App\Http\Controllers\Admin\ProductByCategorySlider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSliderThreeController extends Controller
{
    public function index()
    {
        return view('admin.product_by_category_slider.slider_three');
    }
}
