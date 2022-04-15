<?php

namespace App\Providers;
use App\Brand;
use App\Category;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('clientPages.brand', function($view){
            $brands = Brand::all();
            $view->with('brands', $brands);
        });
        view()->composer('clientPages.categories', function($view){
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
