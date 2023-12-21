<?php

namespace App\Http\Controllers\Admin\ProductByCategorySlider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SliderTwo;
use Illuminate\Http\Request;

class AdminSliderTwoController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $sliderCategory = SliderTwo::get();
        return view('admin.product_by_category_slider.slider_two')
            ->with(['categories' => $categories,'sliderCategory' => $sliderCategory]);
    }
    public function store()
    {

    }


    public function destroy()
    {

    }
}
