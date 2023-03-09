<?php

use App\Http\Controllers\Sistema\UsuarioController;
use App\Http\Controllers\Sistema\ProveedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
Route::get('maqueta/editar-mi-perfil/', function () {
    return view('maqueta.proveedor.perfil');
});


Route::group(['as' => 'web.'], function () {
    Route::middleware(['guest'])->group(function () {

        // Route::get('login', [AuthController::class, 'login'])->name('login');
        // Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
        Route::get('recuperar-contrasena', [AuthController::class, 'restorePassword'])->name('restore.password');
        Route::post('store', [AuthController::class, 'storePassword'])->name('store.password');
        Route::get('', [AuthController::class, 'login'])->name('login');
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
        //Route::get('recuperar-contrasena', [AuthController::class, 'restorePassword'])->name('restore.password');
        //Route::post('store', [AuthController::class, 'storePassword'])->name('store.password');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    // Route::group(['prefix' => 'cuenta', 'as' => 'cuenta.'], function () {
    //      Route::get('edit', [CuentaController::class, 'edit'])->name('edit');
    //      Route::put('update', [CuentaController::class, 'update'])->name('update');
    // });

    Route::group(['prefix' => 'usuario', 'as' => 'usuario.'], function () {
        Route::get('', [UsuarioController::class, 'index'])->name('index');
        // Route::get('list', [UsuarioController::class, 'list'])->name('list');
        // Route::get('nuevo-usuario', [UsuarioController::class, 'create'])->name('create');
        // Route::post('store', [UsuarioController::class, 'store'])->name('store');
        // Route::get('editar-usuario/{id}', [UsuarioController::class, 'edit'])->name('edit')->whereNumber('id');
        // Route::post('update/{id}', [UsuarioController::class, 'update'])->name('update')->whereNumber('id');
        // Route::get('delete/{id}', [UsuarioController::class, 'delete'])->name('delete')->whereNumber('id');
        // Route::get('download-excel', [UsuarioController::class, 'downloadExcel'])->name('download.excel');
    });

    Route::group(['prefix' => 'proveedor', 'as' => 'proveedor.'], function () {
         Route::get('', [ProveedorController::class, 'index'])->name('index');
         Route::get('list', [ProveedorController::class, 'list'])->name('list');
         Route::get('nuevo-proveedor', [ProveedorController::class, 'create'])->name('create');
         Route::post('store', [ProveedorController::class, 'store'])->name('store');
         Route::get('editar-proveedor/{id}', [ProveedorController::class, 'edit'])->name('edit');
         Route::post('update/{id}', [ProveedorController::class, 'update'])->name('update');
         Route::get('delete/{id}', [ProveedorController::class, 'delete'])->name('delete')->whereNumber('id');
         Route::get('download-excel', [ProveedorController::class, 'downloadExcel'])->name('download.excel');
    });
});
