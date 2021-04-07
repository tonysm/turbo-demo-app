<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Events\RequestReceived;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        if ($_SERVER['LARAVEL_OCTANE'] ?? false) {
            $this->app['events']->listen(RequestReceived::class, function () {
                $this->loadChannelRoutes();
            });
        } else {
            $this->loadChannelRoutes();
        }
    }

    public function loadChannelRoutes(): void
    {
        require base_path('routes/channels.php');
    }
}
