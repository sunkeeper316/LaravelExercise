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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    //要驗證才能訪問的路由
    Route::get('/checkout','App\Http\Controllers\SiteController@renderCheckoutPage');
    Route::post('/checkout','App\Http\Controllers\SiteController@checkout');
    Route::get('/shop/cart','App\Http\Controllers\SiteController@renderCartPage');
    Route::get('/shop/addcart/{product}','App\Http\Controllers\SiteController@addCart');
});