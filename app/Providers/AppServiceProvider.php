<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;

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
        try {
            $siteSetting = SiteSetting::first();
            View::share('siteSetting', $siteSetting);
        } catch (\Exception $e) {
            // Ignore if table doesn't exist yet (e.g. during migrations)
        }
    }
}
