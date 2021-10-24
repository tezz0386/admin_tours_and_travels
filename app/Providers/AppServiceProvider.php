<?php

namespace App\Providers;

use App\Models\Admin\Category\Category;
use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Setting\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
        $footerCategories = PackageCategory::orderByDesc('created_at')->get();
        View::share('footerCategories', $footerCategories);
        $navCategories = Category::orderByDesc('created_at')->get();
        View::share('navCategories', $navCategories);
        $setting = Setting::find(1);
        define('SITE_EMAIL', $setting->email);
        define('SITE_NAME', $setting->name);
        define('SITE_LOCATION', $setting->location);
        View::share('setting', $setting);
        Paginator::useBootstrap();
    }
}
