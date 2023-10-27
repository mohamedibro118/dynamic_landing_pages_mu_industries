<?php

use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\admin\LeadsController;
use App\Http\Controllers\themes\LPagesController;
use App\Http\Controllers\themes\Theme1Controller;
use App\Http\Controllers\themes\Theme2Controller;
use App\Http\Controllers\themes\Theme3Controller;
use App\Http\Controllers\themes\Theme4Controller;
use App\Http\Controllers\themes\Theme5Controller;
use App\Http\Controllers\themes\Theme6Controller;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



//  front20
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/landing_page/theme1', [Theme1Controller::class, 'show'])->name('theme1.view');
        Route::get('/landing_page/theme2', [Theme2Controller::class, 'show'])->name('theme2.view');
        Route::get('/landing_page/theme3', [Theme3Controller::class, 'show'])->name('theme3.view');
        Route::get('/landing_page/theme4', [Theme4Controller::class, 'show'])->name('theme4.view');
        Route::get('/landing_page/theme5', [Theme5Controller::class, 'show'])->name('theme5.view');
        Route::get('/landing_page/theme6', [Theme6Controller::class, 'show'])->name('theme6.view');
        Route::group(['domain' => '{company_name}.localhost', 'middleware' => 'checkagent'], function () {
            Route::get('/landing_page/{slug}', [LPagesController::class, 'show'])->name('landing_page');
        });
        
        // Route::get('/landing_page/{slug}', [LPagesController::class, 'show'])->name('landing_page');
        Route::get('/react', function () {
            return view('react');}); 
    }
);








Route::post('/contact-form', [LeadsController::class, 'store'])->name('leads.store');

//  require __DIR__ . '/auth.php';
