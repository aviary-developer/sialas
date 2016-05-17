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

Route::resource('presentaciones', 'PresentacionesController');
Route::get('presentaciones/crear/{producto}','PresentacionesController@crear');
Route::match(['get','post'],'/guardarPresentaciones/{id}','PresentacionesController@guardar');




Route::resource('servicios','ServiciosController');
Route::match(['get','post'],'/darAltaServicio/{id}','ServiciosController@darAlta');





Route::resource('mobiliarios', 'MobiliariosController');
Route::match(['get','post'],'/darAltaMobiliarios/{id}','MobiliariosController@darAlta');


Route::resource('users','UsersController');









Route::resource ('clientes', 'ClientesController');
Route::match(['get','post'],'/darAltaClientes/{id}','ClientesController@darAlta');



Route::resource('clasificaciones', 'ClasificacionesController');
Route::match(['get','post'],'/darAltaClasificaciones/{id}','ClasificacionesController@darAlta');




Route::resource('cajas', 'CajasController');
Route::match(['get','post'],'/darAltaCaja/{id}','CajasController@darAlta');








Route::resource('cuentas', 'CuentasController');

Route::resource('distribuidores', 'DistribuidoresController');
Route::match(['get','post'],'/darAltaDistribuidores/{id}','DistribuidoresController@darAlta');


Route::resource ('proveedores', 'ProveedoresController');
Route::match(['get','post'],'/darAltaProveedores/{id}','ProveedoresController@darAlta');






Route::resource('productos','ProductosController');
Route::match(['get','post'],'/darAltaProductos/{id}','ProductosController@darAlta');




Route::resource('bancos', 'BancosController');
Route::match(['get','post'],'/darAltaBanco/{id}','BancosController@darAlta');

Route::resource('tipos', 'TiposController');
Route::match(['get','post'],'/darAltaTipos/{id}','TiposController@darAlta');