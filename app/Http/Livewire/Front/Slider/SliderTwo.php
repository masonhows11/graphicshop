<?php

namespace App\Http\Livewire\Front\Slider;

use App\Models\Product;
use Livewire\Component;
use App\Models\SliderTwo as SliderTwoModel;
class SliderTwo extends Component
{
    public $category_title;
    public $products;

    public function mount()
    {

        $slider = SliderTwoModel::first();
        $products = null;
        $category_title = null;
        if ($slider) {
            $this->products = Product::where('category_id', '=', SliderTwoModel::select('category_id')->first()->category_id)->get();
            $this->category_title = $slider->category_name;
        }
    }


    public function render()
    {
        return view('livewire.front.slider.slider-two')
            ->with(['products' => $this->products != null ? $this->products : null, 'category_title' => $this->category_title != null ? $this->category_title : null]);
    }
}
