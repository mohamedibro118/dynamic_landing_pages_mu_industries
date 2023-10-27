<?php

use App\Http\Controllers\admin\AgentController;
use App\Http\Controllers\admin\authentications\AdminController;
use App\Http\Controllers\admin\authentications\RoleController;
use App\Http\Controllers\admin\authentications\SuberAdminController;
use App\Http\Controllers\admin\authentications\UserController;
use App\Http\Controllers\admin\CompanyProfileController;
use App\Http\Controllers\admin\Dashcontroller;
use App\Http\Controllers\admin\LeadsController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\GoogleAdsController;
use App\Http\Controllers\themes\SnipptsCodeController;
use App\Http\Controllers\themes\IndexThemesController;
use App\Http\Controllers\themes\LPagesController;
use App\Http\Controllers\themes\PuppeteerController;
use App\Http\Controllers\themes\Theme1Controller;
use App\Http\Controllers\themes\Theme2Controller;
use App\Http\Controllers\themes\Theme3Controller;
use App\Http\Controllers\themes\Theme4Controller;
use App\Http\Controllers\themes\Theme5Controller;
use App\Http\Controllers\themes\Theme6Controller;
use App\Http\Controllers\UnitTypeController;
use Illuminate\Support\Facades\Route;


const PAGINATE = 12;

Route::group(['middleware' => 'auth'], function () {

    // temporally


    Route::group(['prefix' => 'admin/dashbourd'], function () {
        
        Route::get('/', [Dashcontroller::class, 'index'])->name('dashbourd');
      
        
        // zero module agents
        Route::group(['prefix' => 'dev', 'as' => 'dashbourd.dev.','middleware'=>'suber'], function () {
            Route::get('/agents/trash', [AgentController::class, 'trash'])->name('agents.trash');
            Route::put('/agents/{agent}/restore', [AgentController::class, 'restore'])->name('agents.restore');
            Route::delete('/agents/{agent}/force-delete', [AgentController::class, 'forceDelete'])->name('agents.force-delete');
            Route::resource('agents', AgentController::class);
            Route::resource('suberadmins', SuberAdminController::class);
            
        });

           //four modules contact form leads
        Route::group(['as' => 'dashbourd.'], function () {
            Route::get('leads',[LeadsController::class,'index'])->name('leads.index');
            Route::post('leads/store',[LeadsController::class,'store'])->name('leads.store');
            Route::delete('leads/delete/{lead}',[LeadsController::class,'destroy'])->name('leads.destroy');
           
        });
      
      
       
       
        //five modules company sitting
        Route::group(['as' => 'dashbourd.'], function () {
            Route::get('company_profiles',[CompanyProfileController::class,'edit'])->name('companyprofiles.edit');
            Route::put('company_profiles/{agent}',[CompanyProfileController::class,'update'])->name('companyprofiles.update');
        });

        //six modules authentication 
        Route::group(['as' => 'dashbourd.authentication.'], function () {
            Route::resource('roles',RoleController::class);

            Route::get('/admins/trash', [AdminController::class, 'trash'])->name('admins.trash');
            Route::put('/admins/{admin}/restore', [AdminController::class, 'restore'])->name('admins.restore');
            Route::delete('/admins/{admin}/force-delete', [AdminController::class, 'forceDelete'])->name('admins.force-delete');
            Route::resource('admins',AdminController::class);

            Route::resource('users',UserController::class);

        });

        // themes index
        Route::group(['prefix' => '/all-themes', 'as' => 'dashbourd.themes.'], function () {
            Route::get('/', [IndexThemesController::class, 'index'])->name('index');
           
        });
        // code snippets
        Route::group(['prefix' => '/code_snippets', 'as' => 'dashbourd.code_snippets.'], function () {
            Route::get('/edit', [SnipptsCodeController::class, 'edit'])->name('edit');
            Route::post('/update', [SnipptsCodeController::class, 'update'])->name('update');
           
        });
        // Lpages  
        Route::group(['prefix' => '/landing_pages', 'as' => 'dashbourd.landing_pages.'], function () {
            Route::get('/index', [LPagesController::class, 'index'])->name('index');
            Route::delete('/delete/{id}', [LPagesController::class, 'destroy'])->name('destroy');
           
        });
        // theme1
        Route::group(['prefix' => '/themes/theme1', 'as' => 'dashbourd.themes.theme1.'], function () {
            Route::get('/create', [Theme1Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [Theme1Controller::class, 'edit'])->name('edit');
            Route::post('/store', [Theme1Controller::class, 'store'])->name('store');
            Route::post('/update/{id}', [Theme1Controller::class, 'update'])->name('update');
            Route::get('/index', [Theme1Controller::class, 'index'])->name('index');
            Route::post('/preview_store', [Theme1Controller::class, 'storePreview'])->name('preview.store');
            Route::post('/uploade_unit_photo', [Theme1Controller::class, 'uploadeUnitPhoto'])->name('uploade_unit_photo');
            Route::post('/uploade_feature_icons', [Theme1Controller::class, 'uploadeFeatureIcon'])->name('uploade_feature_icons');
        });
        // theme2
        Route::group(['prefix' => '/themes/theme2', 'as' => 'dashbourd.themes.theme2.'], function () {
            Route::get('/create', [Theme2Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [Theme2Controller::class, 'edit'])->name('edit');
            Route::post('/store', [Theme2Controller::class, 'store'])->name('store');
            Route::post('/update/{id}', [Theme2Controller::class, 'update'])->name('update');
            Route::get('/index', [Theme2Controller::class, 'index'])->name('index');
            Route::post('/uploade_unit_photo', [Theme2Controller::class, 'uploadeUnitPhoto'])->name('uploade_unit_photo');
            Route::post('/uploade_feature_icons', [Theme2Controller::class, 'uploadeFeatureIcon'])->name('uploade_feature_icons');
        });
        // theme3
        Route::group(['prefix' => '/themes/theme3', 'as' => 'dashbourd.themes.theme3.'], function () {
            Route::get('/create', [Theme3Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [Theme3Controller::class, 'edit'])->name('edit');
            Route::post('/store', [Theme3Controller::class, 'store'])->name('store');
            Route::post('/update/{id}', [Theme3Controller::class, 'update'])->name('update');
            Route::get('/index', [Theme3Controller::class, 'index'])->name('index');
            Route::post('/uploade_unit_photo', [Theme3Controller::class, 'uploadeUnitPhoto'])->name('uploade_unit_photo');
            Route::post('/uploade_feature_icons', [Theme3Controller::class, 'uploadeFeatureIcon'])->name('uploade_feature_icons');
        });
        // theme4
        Route::group(['prefix' => '/themes/theme4', 'as' => 'dashbourd.themes.theme4.'], function () {
            Route::get('/create', [Theme4Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [Theme4Controller::class, 'edit'])->name('edit');
            Route::post('/store', [Theme4Controller::class, 'store'])->name('store');
            Route::post('/update/{id}', [Theme4Controller::class, 'update'])->name('update');
            Route::get('/index', [Theme4Controller::class, 'index'])->name('index');
            Route::post('/uploade_unit_photo', [Theme4Controller::class, 'uploadeUnitPhoto'])->name('uploade_unit_photo');
            Route::post('/uploade_feature_icons', [Theme4Controller::class, 'uploadeFeatureIcon'])->name('uploade_feature_icons');
        });
        // theme5
        Route::group(['prefix' => '/themes/theme5', 'as' => 'dashbourd.themes.theme5.'], function () {
            Route::get('/create', [Theme5Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [Theme5Controller::class, 'edit'])->name('edit');
            Route::post('/store', [Theme5Controller::class, 'store'])->name('store');
            Route::post('/update/{id}', [Theme5Controller::class, 'update'])->name('update');
            Route::get('/index', [Theme5Controller::class, 'index'])->name('index');
            Route::post('/uploade_unit_photo', [Theme5Controller::class, 'uploadeUnitPhoto'])->name('uploade_unit_photo');
            Route::post('/uploade_feature_icons', [Theme5Controller::class, 'uploadeFeatureIcon'])->name('uploade_feature_icons');
        });
        // theme6
        Route::group(['prefix' => '/themes/theme6', 'as' => 'dashbourd.themes.theme6.'], function () {
            Route::get('/create', [Theme6Controller::class, 'create'])->name('create');
            Route::get('/edit/{id}', [Theme6Controller::class, 'edit'])->name('edit');
            Route::post('/store', [Theme6Controller::class, 'store'])->name('store');
            Route::post('/update/{id}', [Theme6Controller::class, 'update'])->name('update');
            Route::get('/index', [Theme6Controller::class, 'index'])->name('index');
            Route::post('/uploade_unit_photo', [Theme6Controller::class, 'uploadeUnitPhoto'])->name('uploade_unit_photo');
            Route::post('/uploade_feature_icons', [Theme6Controller::class, 'uploadeFeatureIcon'])->name('uploade_feature_icons');
        });
        Route::group(['prefix' => '/units', 'as' => 'dashbourd.'], function () {
            Route::post('/add_unit_type', [UnitTypeController::class, 'store'])->name('add_unit_type');
        });
        // compigns
        // Route::group(['prefix' => '/compaigns', 'as' => 'dashbourd.compaigns.'], function () {
        //     // Route::get('/authenticate_google', [GoogleAdsController::class, 'authenticate'])->name('authenticate_google');
           
        // });
        
        Route::get('compaigns/google_ads_compaigns', [GoogleAdsController::class, 'compaignResults'])->name('google_ads_compaigns');
       
        Route::get('profile',[ProfileController::class,'edit'])->name('profile.edit');
        Route::patch('profile',[ProfileController::class,'update'])->name('profile.update');


    }); //end prefix dashbourd
}); //end auth middleware



// take capture for url pages
Route::get('/puppeteer/capture-screenshots', [PuppeteerController::class,'runNodeScript'])->name('puppeteer');