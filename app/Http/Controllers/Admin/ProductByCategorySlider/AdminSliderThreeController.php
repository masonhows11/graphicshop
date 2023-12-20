<?php

namespace App\Http\Controllers\Admin\ProductByCategorySlider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SliderThree;
use Illuminate\Http\Request;

class AdminSliderThreeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $sliderCategory = SliderThree::get();
        return view('admin.product_by_category_slider.slider_three')
            ->with(['categories' => $categories,'sliderCategory' => $sliderCategory]);
    }
}
