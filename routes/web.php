<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::post('userUpdate', 'App\Http\Controllers\ProfileController@userUpdate');

Route::get('addToCart/{id}', 'App\Http\Controllers\CartController@addToCart');
    
Route::get('removeFromCart/{id}', 'App\Http\Controllers\CartController@removeFromCart');

Auth::routes();

Route::group(['prefix'=>'{lang}'], function(){

    Route::get('/main', function () {
        return view('main');
    });
    
    Route::get('/profile', function(){
        return view('profile');
    });
    
    Route::get('/forgetpassword', function(){
        return view('forgetpassword');
    });
    
    Route::get('/cart', function(){
        return view('cart');
    });
    
    Route::get('/edit', function(){
        return view('edit');
    });
    
    Route::get('/types', 'App\Http\Controllers\ProductController@index');
    
    Route::get('/cart', 'App\Http\Controllers\CartController@index');
});