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
// Rotas para ambiente administrativo usuário comum
Auth::routes();
Route::get('/home', 'HomeController@index')->name('admin.home');
Route::get('/perfil', 'ProfileController@index')->name('admin.perfil');
Route::post('/perfil/{cliente}', 'ProfileController@update')->name('admin.perfil.update');
Route::get('/perfil/{cliente}/descadastrar-email', 'DescadastrarController')->name('descadastrar.email');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('/pedidos/table/get', 'PedidoController')->name('voyager.pedidos.table');
});


Route::get('/', 'PublicController@index')->name('home');
Route::get('/sobre-nos', 'PagesController@sobre')->name('about');

Route::group(['prefix' => 'carrinho'], function () {
    Route::get('/', 'CarrinhoController@carrinho')->name('cart');
    Route::post('/atualizar', 'CarrinhoController@atualizarCarrinho')->name('update.cart');
    Route::get('/{produto}/remover/{flavor}', 'CarrinhoController@removerCarrinho')->name('delete.cart');
    Route::post('/{produto}/adicionar', 'CarrinhoController@adicionarCarrinho')->name('add.cart');
    Route::get('/finalizar', 'CheckoutController@finalizar')->name('cart.finish');
    Route::post('/finalizar', 'CheckoutController@checkout')->name('cart.checkout');
    Route::get('/obrigado', 'CheckoutController@obrigado')->name('cart.thanks');
});

Route::post('/cupom/validar', 'CupomController@validar')->name('cupom.validar');

Route::get('/pesquisar/{produto?}', 'ShopController@pesquisa')->name('product.search');
Route::get('/produtos', 'ShopController@showAll')->name('shop');
Route::get('/categoria/{categoria}', 'ShopController@showCategoria')->name('categoria.show');
Route::get('/produto/{produto}', 'ShopController@show')->name('product.show');
