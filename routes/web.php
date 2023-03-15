<?php

use App\Http\Controllers\Sistema\UsuarioController;
use App\Http\Controllers\Sistema\ProveedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Sistema\PagoController;
use App\Http\Controllers\Sistema\CargaMasivaController;

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


Route::group(['as' => 'web.'], function () {
     Route::middleware(['guest'])->group(function () {
          Route::get('recuperar-contrasena', [AuthController::class, 'restorePassword'])->name('restore.password');
          Route::post('store', [AuthController::class, 'storePassword'])->name('store.password');
          Route::get('', [AuthController::class, 'login'])->name('login');
          Route::get('login', [AuthController::class, 'login'])->name('login');
          Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
     });

     Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
     Route::group(['prefix' => 'usuario', 'as' => 'usuario.', 'middleware' => ['role:Administrador']], function () {
          Route::get('', [UsuarioController::class, 'index'])->name('index');
          Route::get('list', [UsuarioController::class, 'list'])->name('list');
          Route::get('nuevo-usuario', [UsuarioController::class, 'create'])->name('create');
          Route::post('store', [UsuarioController::class, 'store'])->name('store');
          Route::get('editar-usuario/{id}', [UsuarioController::class, 'edit'])->name('edit')->whereNumber('id');
          Route::post('update/{id}', [UsuarioController::class, 'update'])->name('update')->whereNumber('id');
          Route::get('delete/{id}', [UsuarioController::class, 'delete'])->name('delete')->whereNumber('id');
          Route::get('download-excel', [UsuarioController::class, 'downloadExcel'])->name('download.excel');
     });

     Route::group(['prefix' => 'pago', 'as' => 'pago.', 'middleware' => ['role:Finanza|Gerente|Tesorero|Proveedor']], function () {
          Route::get('', [PagoController::class, 'index'])->name('index');
          Route::get('list', [PagoController::class, 'list'])->name('list');
          Route::get('show/{id}', [PagoController::class, 'show'])->name('show')->whereNumber('id');
          Route::get('download-excel/{id?}', [PagoController::class, 'downloadExcel'])->name('download.excel')->whereNumber('id');
     });

     Route::group(['prefix' => 'proveedor', 'as' => 'proveedor.', 'middleware' => ['role:Administrador']], function () {
          Route::get('', [ProveedorController::class, 'index'])->name('index');
          Route::get('list', [ProveedorController::class, 'list'])->name('list');
          Route::get('nuevo-proveedor', [ProveedorController::class, 'create'])->name('create');
          Route::post('store', [ProveedorController::class, 'store'])->name('store');
          Route::get('editar-proveedor/{id}', [ProveedorController::class, 'edit'])->name('edit');
          Route::post('update/{id}', [ProveedorController::class, 'update'])->name('update');
          Route::get('delete/{id}', [ProveedorController::class, 'delete'])->name('delete')->whereNumber('id');
          Route::get('download-excel', [ProveedorController::class, 'downloadExcel'])->name('download.excel');
     });

     Route::group(['prefix' => 'carga', 'as' => 'carga.'], function () {
          Route::get('', [CargaMasivaController::class, 'index'])->name('index')->role('Tesorero');
          Route::get('list', [CargaMasivaController::class, 'list'])->name('list')->role('Tesorero');
          Route::post('importar-excel', [CargaMasivaController::class, 'importar'])->name('importar');
          Route::get('nuevo-proveedor', [CargaMasivaController::class, 'create'])->name('create');
          Route::post('store', [CargaMasivaController::class, 'store'])->name('store');
          Route::get('editar-proveedor/{id}', [CargaMasivaController::class, 'edit'])->name('edit');
          Route::post('update/{id}', [CargaMasivaController::class, 'update'])->name('update');
          Route::get('delete/{id}', [CargaMasivaController::class, 'delete'])->name('delete')->whereNumber('id');
          Route::get('download-excel', [CargaMasivaController::class, 'downloadExcel'])->name('download.excel');
     });
});
