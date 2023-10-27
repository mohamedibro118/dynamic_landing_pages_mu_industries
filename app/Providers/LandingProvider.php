<?php

namespace App\Providers;


use App\Repositories\TemporaryDataRepository;
use App\Repositories\TemporaryDataArrayRepository;
use Illuminate\Support\ServiceProvider;

class LandingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TemporaryDataRepository::class, TemporaryDataArrayRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
