<?php

namespace App\Providers;

use App\Models\Category;
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
        View::composer(['front.categories','front.include.side_category'],function ($view){
            $view->with('categories',Category::tree()->get()->toTree());
        });
        // for banner category
        View::composer(['front.layouts.product_slider.slider_banner'],function ($view){
            $view->with('products',Category::find(1)->products()->take(4)->get() ?? null);
        });
        // for visit card category
        View::composer(['front.layouts.product_slider.slider_visit_card'],function ($view){
            $view->with('products',Category::find(2)->products()->take(4)->get() ?? null);
        });
        // for tract category
        View::composer(['front.layouts.product_slider.slider_tract'],function ($view){
            $view->with('products',Category::find(3)->products()->take(4)->get() ?? null);
        });

    }
}
