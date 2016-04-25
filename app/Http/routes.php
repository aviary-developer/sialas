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
Route::resource('marcas','MarcasController');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', 'CategoriasController');

Route::resource('servicios','ServiciosController');

Route::resource('users','UsersController');

Route::resource ('clientes', 'ClientesController');

Route::resource('cajas', 'CajasController');
Route::match(['get','post'],'/darAltaCaja/{id}','CajasController@darAlta');
