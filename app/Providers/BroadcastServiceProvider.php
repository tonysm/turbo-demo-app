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

        $this->app['events']->listen(RequestReceived::class, function () {
            require base_path('routes/channels.php');
        });
    }
}
