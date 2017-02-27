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

Route::get('/', 'principal@index');

//rutas controladorUsuario
Route::get('usuario/ingresar', 'UsuarioController@ingresar');

Route::resource('usuario','UsuarioController');
Route::get('logout','LogController@logout');
Route::resource('login','LogController');


// Rutas de Miguel
Route::resource('conductor', 'ConductorController');

Route::resource('proveedores','ProveedoresController');

?>
