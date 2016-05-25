<?php
Route::group(['middleware'=>['auth','administrador']], function(){ //ADMINISTRADOR


});

Route::group(['middleware'=>['auth','gerente']], function(){ //GERENTE


});

Route::group(['middleware'=>['auth','vendedor']], function(){ //VENDEDOR


});

Route::group(['middleware'=>['auth','cajero']], function(){ //CAJERO


});
///////////////////////////////////////










//RESERVADO PARA POSIBLES GROUP FUTUROS








//////////////////////////////////////
Route::get('/', function () {
	$users=DB::select('select * from users');
        $cuenta=0;
        foreach ($users as $us) {
          $cuenta=$cuenta+1;
        }
        if($cuenta==0){
        	return view('primerUsuario');

        }else{
        	return view('auth/login');
        }
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

Route::resource('login','LoginController');



Route::resource('mobiliarios', 'MobiliariosController');
Route::match(['get','post'],'/darAltaMobiliarios/{id}','MobiliariosController@darAlta');


Route::resource('users','UsersController');




Route::resource('bancoservicios', 'BancoserviciosController');
Route::match(['get','post'],'/darAltaBancoservicios/{id}','BancoserviciosController@darAlta');

Route::resource('bancomobiliarios', 'BancomobiliariosController');
Route::match(['get','post'],'/darAltaBancomobiliarios/{id}','BancomobiliariosController@darAlta');



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



Route::resource('ubicaciones', 'UbicacionesController');
Route::match(['get','post'],'/darAltaUbicacion/{id}','UbicacionesController@darAlta');



Route::resource('compras', 'ComprasController');
Route::match(['get','post'],'/productospresentaciones/{cadena}','ComprasController@productospresentaciones');


Route::resource('detallecompras', 'DetallecomprasController');









Route::resource ('asistencias', 'AsistenciasController');

Route::resource('detallecompras', 'DetallecomprasController');






Route::resource('cajaservicios', 'CajaserviciosController');