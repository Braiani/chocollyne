<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/cep/{cep}', 'PublicController@buscaCep')->name('api.cep');
Route::get('/pedidos/teste', function () {
    return \App\Pedido::find(2);
})->name('api.pedidos');
