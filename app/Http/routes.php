<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::resource('marcas','MarcasController');
Route::match(['get','post'],'/darAltaMarcas/{id}','MarcasController@darAlta');









Route::resource('categorias', 'CategoriasController');
Route::match(['get','post'],'/darAltaCategorias/{id}','CategoriasController@darAlta');








Route::resource('servicios','ServiciosController');
Route::match(['get','post'],'/darAltaServicio/{id}','ServiciosController@darAlta');








Route::resource('users','UsersController');









Route::resource ('clientes', 'ClientesController');
Route::match(['get','post'],'/darAltaClientes/{id}','ClientesController@darAlta');








Route::resource('cajas', 'CajasController');
Route::match(['get','post'],'/darAltaCaja/{id}','CajasController@darAlta');








Route::resource('cuentas', 'CuentasController');



Route::resource ('proveedores', 'ProveedoresController');
Route::match(['get','post'],'/darAltaProveedores/{id}','ProveedoresController@darAlta');







Route::resource('productos','ProductosController');
Route::match(['get','post'],'/darAltaProductos/{id}','ProductosController@darAlta');
