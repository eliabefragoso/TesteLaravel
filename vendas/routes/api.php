<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/VendedorMicro', 'VendedorController@MicroVendedorJson');

Route::get('/VendedorSocio', 'VendedorController@SocioVendedorJson');
Route::post('/estoque', 'ProdutoController@EstoqueJson');
Route::get('/preencherestoque/{id}', 'VendedorController@PreencherestoqueJson');
Route::put('/remover/{id}', 'ProdutoController@esvaziarEstoqueJson');
Route::get('/cep', 'RuaController@cepJson');
Route::get('/rua/{cep}', 'RuaController@ruaJson');
Route::get('/cidade','CidadeController@cidadeJson');
Route::get('/estado','EstadoController@estadoJson');