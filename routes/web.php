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