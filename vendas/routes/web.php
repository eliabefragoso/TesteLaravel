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
    return view('index');
});


//Vendedores

Route::get('/vendedores', 'VendedorController@index')->middleware(['auth']);
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
Route::get('/produtos/estoque/vendedor', 'ProdutoController@EstoqueVendedor');
//post 
Route::post('/produtos/{id}', 'ProdutoController@update');
Route::post('/produtos', 'ProdutoController@store');
//imagens produto
Route::post('/image', "ImagemController@store");
Route::get('/imagem/apagar/{id}',"ImagemController@destroy");
Route::get('/imagem/novo/{id}', "ImagemController@create");
Route::get('/inserirImagem/{id}', "ImagemController@index");

//Rotas para Categorias 

Route::get('/categorias', 'ControladorCategoria@index')->middleware(['auth']);
Route::get('/categorias/novo', 'ControladorCategoria@create')->middleware(['auth']);
Route::post('/categorias', 'ControladorCategoria@store')->middleware(['auth']);
Route::get('/categorias/apagar/{id}', 'ControladorCategoria@destroy')->middleware(['auth']);
Route::get('/categorias/editar/{id}', 'ControladorCategoria@edit')->middleware(['auth']);
Route::post('/categorias/{id}', 'ControladorCategoria@update')->middleware(['auth']);

//Rotas para Clientes.

Route::get('/clientes/novo', 'ClienteController@create');

//rotas de administração
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
