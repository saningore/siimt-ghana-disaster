<?php

namespace App\Providers;

use App\Data\DemoStore;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.ghana', 'partials.eas-strip'], function ($view) {
            $view->with('siteConfig', DemoStore::config());
        });
    }
}
