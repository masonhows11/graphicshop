<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SliderOne;
use App\Models\SliderThree;
use App\Models\SliderTwo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['front.layouts.include.categories','front.include.side_category'],function ($view){
            $view->with(['categories' => Category::tree()->get()->toTree(),
                     'mainCategories'=> Category::where('parent_id',null)->take(10)->get() ]);
        });

        // for banner category
        View::composer(['front.layouts.product_slider.slider_banner'],function ($view){
            $slider = SliderOne::first();
            $products = null;
            $category_title = null;
            if($slider)
            {
                $products = Product::where('category_id','=',SliderOne::select('category_id')->first()->category_id)->get();
                $category_title = $slider->category_name;
            }
            $view->with(['products' => $products != null ? $products : null,'category_title' => $category_title != null ? $category_title : null ]);
        });
        // for visit card category
        View::composer(['front.layouts.product_slider.slider_visit_card'],function ($view){
            $slider = SliderTwo::first();
            $products = null;
            $category_title = null;
            if($slider)
            {
                $products = Product::where('category_id','=',SliderTwo::select('category_id')->first()->category_id)->get();
                $category_title = $slider->category_name;
            }
            $view->with(['products' => $products != null ? $products : null,'category_title' => $category_title != null ? $category_title : null ]);
        });
        // for tract category
        View::composer(['front.layouts.product_slider.slider_tract'],function ($view){
            $slider = SliderThree::first();
            $products = null;
            $category_title = null;
            if($slider)
            {
                $products = Product::where('category_id','=',SliderThree::select('category_id')->first()->category_id)->get();
                $category_title = $slider->category_name;
            }
            $view->with(['products' => $products != null ? $products : null,'category_title' => $category_title != null ? $category_title : null ]);
        });

    }
}
