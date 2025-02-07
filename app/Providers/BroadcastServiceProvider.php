<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Broadcast::routes(['middleware' => ['auth:sanctum']]); // Ensure 'auth' middleware is used
        require base_path('routes/channels.php');
    }

}