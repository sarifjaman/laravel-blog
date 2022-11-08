<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Paginator::useBootstrap();

        $categories = Category::take(5)->get();
        View::share('categories', $categories);

        $setting = Setting::first();
        View::share('setting', $setting);
    }
}
