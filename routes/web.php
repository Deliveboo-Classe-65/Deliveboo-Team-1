<?php

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
        Route::get('/home', 'HomeController@index')->name('home');
        // Route::resource("users", "UserController");

        Route::get('/orders/{userId}', 'OrderController@orderList')->name('orderList');
    });

Route::get('{any?}', function () {
    return view('frontend');
})->where("any", ".*");