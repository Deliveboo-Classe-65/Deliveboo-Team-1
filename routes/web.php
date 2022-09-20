<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware("auth")
    ->name("admin.")
    ->namespace("Admin")
    ->prefix("admin")
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('admin');
        // Route::resource("users", "UserController");
        Route::get('orders', 'OrderController@index')->name('orders_index');
        Route::post('orders', 'OrderController@setOrderSent')->name('set_order_sent');
        Route::resource("dishes", "DishController");
    });

Route::get('{any?}', function () {
    return view('frontend');
})->where("any", ".*");