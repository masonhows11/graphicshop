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

        View::composer(['front.layouts.product_slider.slider_banner'],function ($view){
            $view->with('banners',Category::find(1)->products()->take(4)->get());
        });

        //       $banners =  Category::where('title','بنر')->products()->take(4)->get();
        //       dd($banners);
    }
}
