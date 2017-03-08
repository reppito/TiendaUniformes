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
Route::get('/',function(){
    return Redirect::route('tienda.index');
});
Route::resource('carrito','carrito');
Route::get('tienda/aprobarPagos','TiendaController@aprobarPagos');
Route::put('tienda/pagoAprobado', 'TiendaController@pagoAprobado')->name('Tienda.pagoAprobado');
Route::resource('tienda', 'TiendaController');

//direcciones direcciones
Route::resource('direccion','DireccionesController');
//rutas controladorUsuario
Route::get('usuario/ingresar', 'UsuarioController@ingresar');

Route::resource('usuario','UsuarioController');
Route::get('logout','LogController@logout');
Route::resource('login','LogController');

//FacturaController
Route::resource('factura','FacturaController');
Route::post('factura/direccion','Facturacontroller@crear')->name('factura.crear');

// Rutas de Miguel
Route::resource('conductores', 'ConductorController');

Route::resource('solicitudes-envio', 'SolicitudEnvioController');
Route::post('solicitudes-envio/{idSolicitudEnvio}/accept', 'SolicitudEnvioController@accept');
Route::post('solicitudes-envio/{idSolicitudEnvio}/reject', 'SolicitudEnvioController@reject');

Route::resource('solicitudes-envio-aceptadas', 'SolicitudEnvioAceptadaController');
Route::post('solicitudes-envio-aceptadas/{idSolicitudEnvio}/route', 'SolicitudEnvioAceptadaController@route');
Route::post('solicitudes-envio-aceptadas/{idSolicitudEnvio}/assign', 'SolicitudEnvioAceptadaController@assign');
Route::post('solicitudes-envio-aceptadas/{idSolicitudEnvio}/report', 'SolicitudEnvioAceptadaController@report');
Route::post('solicitudes-envio-aceptadas/{idSolicitudEnvio}/report/received', 'SolicitudEnvioAceptadaController@received');

Route::resource('rutas-transporte', 'RutaTransporteController');

Route::resource('envios-entregados', 'EnvioEntregadoController');

// Rutas de Rafael
Route::resource('proveedores','ProveedoresController');

?>
