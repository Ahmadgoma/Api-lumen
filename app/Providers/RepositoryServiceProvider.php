<?php

namespace App\Providers;

use App\Repositories\VehicleRepository;
use App\Repositories\VehicleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            VehicleRepositoryInterface::class,
            VehicleRepository::class
        );
    }
}
