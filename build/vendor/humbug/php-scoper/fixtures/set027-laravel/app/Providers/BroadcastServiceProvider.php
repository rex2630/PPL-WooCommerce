<?php

namespace PPLCZVendor\App\Providers;

use PPLCZVendor\Illuminate\Support\ServiceProvider;
use PPLCZVendor\Illuminate\Support\Facades\Broadcast;
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
        require base_path('routes/channels.php');
    }
}
