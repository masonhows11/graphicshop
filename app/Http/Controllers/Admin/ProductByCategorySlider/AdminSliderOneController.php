<?php

namespace App\Http\Controllers\Admin\ProductByCategorySlider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SliderOne;
use Illuminate\Http\Request;

class AdminSliderOneController extends Controller
{
    //
    public function create()
    {
        $categories = Category::all();
        $sliderCategory = SliderOne::get();
        return view('admin.product_by_category_slider.slider_one')
            ->with(['categories' => $categories,'sliderCategory' => $sliderCategory]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'category' => ['required']
        ], $messages = [
            'category.required' => 'فیلد دسته بندی الزامی است',
        ]);

        try {

            if (Category::find($request->category)->products()->count() == 0) {
                session()->flash('warning', __('messages.there_are_no_products_for_the_selected_category'));
                return redirect()->route('admin.slider_one.create');
            }
            if (SliderOne::count() == 1) {
                session()->flash('warning', __('messages.you_can_choose_only_one_product_group'));
                return redirect()->route('admin.slider_one.create');
            }

            $category_name = Category::where('id', $request->category)->select('title')->first();
            $description = __('messages.category_products') . ' ' . $category_name->title . ' ' . __('messages.were_selected');
            $result = SliderOne::create([
                'category_id' => $request->category,
                'category_name' => $category_name->title_persian,
                'description' => $description,
            ]);
            if ($result !== null) {
                session()->flash('success', __('messages.New_record_saved_successfully'));
                return redirect()->route('admin.slider_one.create');
            }
            session()->flash('warning', __('messages.An_error_occurred'));
            return redirect()->route('admin.slider_one.create');
        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error')
                ->with(['error' => $ex->getMessage()]);
        }
    }


    public function destroy(SliderOne $slider)
    {
        try {
            $slider->delete();
            session()->flash('success', __('messages.The_deletion_was_successful'));
            return redirect()->route('admin.product.category.index');
        } catch (\Exception $ex) {
            return view('errors_custom.general_error')->with(['error' => $ex->getMessage()]);
        }
    }
}
