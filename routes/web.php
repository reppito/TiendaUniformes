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
Route::resource('tienda', 'TiendaController');

//rutas controladorUsuario
Route::get('usuario/ingresar', 'UsuarioController@ingresar');

Route::resource('usuario','UsuarioController');
Route::get('logout','LogController@logout');
Route::resource('login','LogController');


// Rutas de Miguel
Route::resource('conductores', 'ConductorController');

Route::resource('solicitudes-envio', 'SolicitudEnvioController');
Route::post('solicitudes-envio/{idSolicitudEnvio}/accept', 'SolicitudEnvioController@accept');
Route::post('solicitudes-envio/{idSolicitudEnvio}/reject', 'SolicitudEnvioController@reject');

// Rutas de Rafael
Route::resource('proveedores','ProveedoresController');

?>
