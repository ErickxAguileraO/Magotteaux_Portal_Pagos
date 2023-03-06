<?php

use Illuminate\Support\Facades\Route;

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

/***** MAQUETA *****/
Route::get('/', function () {
    return view('welcome');
});
Route::get('maqueta/login/', function () {
     return view('maqueta.login.index');
});
Route::get('maqueta/login/recuperar', function () {
     return view('maqueta.login.recuperar');
});
Route::get('maqueta/login/nueva', function () {
     return view('maqueta.login.nueva');
});
Route::get('maqueta/login/envio', function () {
     return view('maqueta.login.envio');
});


Route::get('maqueta/cargas/', function () {
     return view('maqueta.cargas.index');
});
Route::get('maqueta/pagos/', function () {
     return view('maqueta.pagos.index');
});
Route::get('maqueta/pagos/proveedor/', function () {
     return view('maqueta.pagos.proveedor');
});
Route::get('maqueta/pagos/detalle/', function () {
     return view('maqueta.pagos.detalle');
});
Route::get('maqueta/pagos/detalle2/', function () {
     return view('maqueta.pagos.detalle2');
});

Route::get('maqueta/usuario/', function () {
     return view('maqueta.usuario.index');
});
Route::get('maqueta/usuario/crear', function () {
     return view('maqueta.usuario.crear');
});
Route::get('maqueta/proveedor/', function () {
     return view('maqueta.proveedor.index');
});
Route::get('maqueta/proveedor/crear', function () {
     return view('maqueta.proveedor.crear');
});