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

Route::get('/', 'PublicController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('admin.home');
Route::get('/pesquisar/{produto?}', 'PublicController@pesquisa')->name('product.search');
Route::get('/carrinho', 'PublicController@carrinho')->name('cart');
Route::get('/sobre-nos', 'PublicController@sobre')->name('about');
Route::get('/produtos', 'PublicController@show_all')->name('shop');
Route::get('/produto/{produto}', 'PublicController@show')->name('product.show');

Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
