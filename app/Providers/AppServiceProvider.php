<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

require_once app_path('helpers.php');

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
            if (Schema::hasTable('settings')) {
                View::composer('*', function ($view) {
                    $view->with('siteSettings', Setting::allKeyValue());
                });
            }
        } catch (\Throwable $e) {
            // Gracefully catch exceptions during initial setup / artisan commands
        }
    }
}
