<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void


    {
        Gate::before(function ($user,$ability) {
            if ($user->suber_admin) {
                return true;
            }
        });
        
        foreach (config('abilities') as $key => $value) {
            Gate::define($key, function ($user) use ($key) {
                return $user->hasAbility($key);
            });
        }
    }
}
