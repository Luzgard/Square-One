<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function() {
    $crawler = Goutte::request('GET', 'http://duckduckgo.com/html/?q=Laravel');
    $crawler->filter('.result__title .result__a')->each(function ($node) {
      dump($node->text());
    });
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::get('/', 'DishwasherController@index')->name('dishwashers');
Route::post('/addwish', 'DishwasherController@addToWishList');
Route::get('/wishlist', 'DishwasherController@wishList')->name('wishlist');
Route::delete('/wishlist/{id}', 'DishwasherController@destroy')->name('wishlist.destroy');