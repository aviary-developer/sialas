<?php
//Route::group(['middleware'=>['auth','admingerente']], function(){ //ADMINISTRADOR-GERENTE

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

    Route::resource('clasificaciones', 'ClasificacionesController');
    Route::match(['get','post'],'/darAltaClasificaciones/{id}','ClasificacionesController@darAlta');

    Route::resource('cajas', 'CajasController');
    Route::match(['get','post'],'/darAltaCaja/{id}','CajasController@darAlta');

    Route::resource('cuentas', 'CuentasController');

    Route::resource('bancos', 'BancosController');
    Route::match(['get','post'],'/darAltaBanco/{id}','BancosController@darAlta');


    Route::resource('tipos', 'TiposController');
    Route::match(['get','post'],'/darAltaTipos/{id}','TiposController@darAlta');



//});

//Route::group(['middleware'=>['auth','admingerentevendedor']], function(){ //ADMINISTRADOR-GERENTE-VENDEDOR

    Route::resource ('clientes', 'ClientesController');
    Route::match(['get','post'],'/darAltaClientes/{id}','ClientesController@darAlta');

    Route::resource('distribuidores', 'DistribuidoresController');
    Route::match(['get','post'],'/darAltaDistribuidores/{id}','DistribuidoresController@darAlta');


    Route::resource ('proveedores', 'ProveedoresController');
    Route::match(['get','post'],'/darAltaProveedores/{id}','ProveedoresController@darAlta');

    Route::resource('productos','ProductosController');
    Route::match(['get','post'],'/darAltaProductos/{id}','ProductosController@darAlta');

    Route::resource('ubicaciones', 'UbicacionesController');
    Route::match(['get','post'],'/darAltaUbicacion/{id}','UbicacionesController@darAlta');

    Route::resource('compras', 'ComprasController');
    Route::post('ingresoUbicacion','ComprasController@ingresoUbicacion');
    Route::match(['get','post'],'/productospresentaciones/{cadena}','ComprasController@productospresentaciones');

    Route::resource('ventas', 'VentasController');
    Route::match(['get','post'],'/llenadoPresentacionesVenta/{nombre}','VentasController@llenadoPresentacionesVenta');
    Route::match(['get','post'],'/precioProductoVenta/{producto}/{presentacion}','VentasController@precioProductoVenta');

    Route::resource('detallecompras', 'DetallecomprasController');

    Route::resource ('asistencias', 'AsistenciasController');

    Route::resource ('pagos', 'PagosController');
    Route::get('pagos/crear/{id}','PagosController@crear');
    Route::match(['get','post'],'/guardarPagos/{id}','PagosController@guardar');

    Route::resource ('pagoservicios', 'PagoserviciosController');
    Route::get('pagoservicios/crear/{id}','PagoserviciosController@crear');
    Route::match(['get','post'],'/guardarPagoss/{id}','PagoserviciosController@guardar');

    Route::resource ('pagocompras', 'PagocomprasController');
    Route::get('pagocompras/crear/{id}','PagocomprasController@crear');
    Route::match(['get','post'],'/guardarPagosc/{id}','PagocomprasController@guardar');
//});

//Route::group(['middleware'=>['auth','todos']], function(){ //ADMINISTRADOR-GERENTE-VENDEDOR-CAJERO


//});
//////////////////////////RUTAS DE ACCESO PUBLICO////////////////////////////////////////////////////

Route::resource('login','LoginController');
Route::get('logout','LoginController@logout');//salir


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



 Route::resource ('reparaciones', 'ReparacionesController');
    Route::get('reparaciones/crear/{id}','ReparacionesController@crear');
    Route::match(['get','post'],'/guardarReparaciones/{id}','ReparacionesController@guardar');





















Route::resource('detallecompras', 'DetallecomprasController');






Route::resource('cajaservicios', 'CajaserviciosController');
Route::resource('cajamobiliarios', 'CajamobiliariosController');

Route::resource('bancomobiliarios', 'BancomobiliariosController');
Route::resource('bancoservicios', 'BancoserviciosController');

Route::resource('remesas', 'RemesasController');



Route::resource('rentas','RentasController');


Route::resource('cajausuarios','CajausuariosController');
Route::resource('descuentoaportes','DescuentoaportesController');
Route::match(['get','post'],'/darAltaDescuentoaportes/{id}','DescuentoaportesController@darAlta');
