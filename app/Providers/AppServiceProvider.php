<?php

namespace App\Providers;

use App\Models\Category;
use function foo\func;
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

        view()->composer('layouts.userLayout',function($view){
           $view->with('categories',Category::all());
        });
        view()->composer('admin.layouts.app',function($view){
           $view->with('categories',Category::all());
        });
    }
}
