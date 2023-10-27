<?php

namespace App\Providers;

use App\Actions\Fortify\AuthAdmin;
use App\Actions\Fortify\CreateNewAdmin;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request=request();
        if ($request->is('admin/*')) {
            //  dd('jjj');
            Config::set('fortify.guard','admin');
            Config::set('fortify.passwords','admins');
            Config::set('fortify.prefix','admin');
           
            // Config::set('fortify.home','admin/dashbourd');
        }
       
        $this->app->instance(LoginResponse::class,new class implements LoginResponse{
            public function toResponse($request)
            {
                if ($request->user('admin') ){
                   return redirect()->intended('/admin/dashbourd');
                }
                return redirect()->intended('/');
            }
        });
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // dd(Config::get('fortify.guard'));
       
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::createUsersUsing(CreateNewUser::class);
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        //redirect routes

        if (Config::get('fortify.guard')=='web') {
             Fortify::viewPrefix('front.auth.');
        }else{
           Fortify::authenticateUsing([new AuthAdmin,'checkauthadmin']);
           Fortify::viewPrefix('auth.');
        }

        

        // Fortify::loginView();
    }
}
