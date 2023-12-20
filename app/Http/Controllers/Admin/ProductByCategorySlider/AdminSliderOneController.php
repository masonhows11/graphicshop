<?php

namespace App\Http\Controllers\Admin\ProductByCategorySlider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SliderOne;
use Illuminate\Http\Request;

class AdminSliderOneController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $sliderCategory = SliderOne::get();
        return view('admin.product_by_category_slider.slider_one')
            ->with(['categories' => $categories,'sliderCategory' => $sliderCategory]);
    }

    public function store(){

    }


    public function destroy()
    {

    }
}
