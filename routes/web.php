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

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('/ristoranti', 'RestaurantController');
        Route::resource('{slug}/piatti', 'DishController');
        Route::get('{slug}/ordini', 'OrderController@index')->name('order.index');
    });

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*')->name('home');
