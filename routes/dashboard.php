<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\CustomersController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CatergoriesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;






Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', ]
    ], function(){


        //auth routes
        Auth::routes(['register'=>false,
                       'verfy'=>false,
                       'reset'=>false,
                       'confirm'=>false,
                       'email'=>false

    ]);

        Route::middleware(['auth', 'role:super_admin|admin'])->group(function(){

            Route::get('/', function () {

                return redirect()->route('dashboard');

            });

            Route::get('dashboard', [DashboardController::class , 'index'])->name('dashboard');


            Route::prefix('dashboard')->name('dashboard.')->group(function () {


               //users routes

                Route::resource('users', UsersController::class)->except('show');
            //categories routes

                Route::resource('categories', CatergoriesController::class)->except('show');

             //products routes

                Route::resource('products', ProductsController::class)->except('show');

            //customers routes

                Route::resource('customers', CustomersController::class)->except('show');

            //orders routes




            Route::resource('orders', OrdersController::class)->except('create' ,'store');
            Route::get('customers/{customer}/orders/create' ,[OrdersController::class, 'create'])->name('orders.create');
            Route::post('customers/{customer}/orders/store' ,[OrdersController::class, 'store'])->name('orders.store');




            });

        });





    });
