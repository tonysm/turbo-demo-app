<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Tonysm\TurboLaravel\Facades\Turbo;

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
        Turbo::broadcastToOthers(true);

        if (! $this->app->environment('local')) {
            URL::forceScheme('https');
        }
    }
}
