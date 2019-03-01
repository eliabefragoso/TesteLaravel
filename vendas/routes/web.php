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

Route::get('/', function () {
    return view('welcome');
});


//Vendedores

Route::get('/vendedores', 'VendedorController@index');
Route::get('/vendedores/novo', 'VendedorController@create');
Route::get('/vendedores/editar/{id}', 'VendedorController@edit');
Route::get('/vendedores/apagar/{id}', 'VendedorController@destroy');
//post 
Route::post('/vendedores/{id}', 'VendedorController@update');
Route::post('/vendedores', 'VendedorController@store');

//Produtos

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/novo', 'ProdutoController@create');
Route::get('/produtos/editar/{id}', 'ProdutoController@edit');
Route::get('/produtos/apagar/{id}', 'ProdutoController@destroy');
//post 
Route::post('/produtos/{id}', 'ProdutoController@update');
Route::post('/produtos', 'ProdutoController@store');


