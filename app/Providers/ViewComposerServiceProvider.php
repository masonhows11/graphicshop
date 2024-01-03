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
        View::composer(['front.layouts.include.categories','front.include.side_category'],function ($view){
            $view->with(['categories' => Category::tree()->get()->toTree(),
                        'mainCategories'=> Category::where(['parent_id'=>null,'status' => 1])->take(10)->get() ]);
        });
    }
}
