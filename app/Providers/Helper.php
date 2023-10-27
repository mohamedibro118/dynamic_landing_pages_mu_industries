<?php

namespace App\Providers;

use App\Helber\Helbing;
use Illuminate\Support\ServiceProvider;

class Helper extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Helbing::class,function(){
            return new Helbing();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
