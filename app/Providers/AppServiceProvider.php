<?php

namespace App\Providers;

use App\Models\StaticPage;
use App\Settings;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
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
        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });

        $this->loadHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('static_pages')) {
            view()->share('staticPages', StaticPage::all());
        }
    }

    public function loadHelpers()
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
