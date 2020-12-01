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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/login','livewire.home')->name('login');
Route::put('/logout', 'App\Http\Controllers\CartController@logout')->name('logout');
Route::post('/register', 'App\Http\Controllers\Livewire\LoginRegister@registerStore')->name('user.register');

Route::view('/bypass', 'livewire.loginkey')->name('bypass');
Route::post('/bypasslogin', 'App\Http\Controllers\CartController@bypass')->name('bypasslogin');

Route::get('/shop', 'App\Http\Controllers\CartController@shop')->name('shop');
Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart.index');
Route::post('/add', 'App\Http\Controllers\CartController@add')->name('cart.store');
Route::post('/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::post('/remove', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::post('/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');

Route::get('/list', 'App\Http\Controllers\CartController@list')->name('list');
Route::get('/submit', 'App\Http\Controllers\CartController@submit')->name('submit');
Route::post('/addList', 'App\Http\Controllers\CartController@addList')->name('cart.list');
Route::post('/removeList', 'App\Http\Controllers\CartController@removeList')->name('list.remove');
Route::post('/clearList', 'App\Http\Controllers\CartController@clearList')->name('list.clear');

Route::get('session/get','App\Http\Controllers\CartController@accessSessionData')->name('sessionGet');
Route::get('session/set','App\Http\Controllers\CartController@storeSessionData')->name('sessionSet');
Route::get('session/remove','App\Http\Controllers\CartController@deleteSessionData')->name('sessionRemove');