<?php

namespace App\Providers;

use App\Services\VehicleService;
use App\Services\VehicleServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            VehicleServiceInterface::class,
            VehicleService::class
        );
    }
}
