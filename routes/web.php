<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nuevavistaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
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




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('productos', [nuevavistaController::class, 'mostrarProductos'])->middleware('verificar_usuario');
Route::get('no_admin', [nuevavistaController::class, 'noAdmin'])->name('no_admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']], function(){
    Route::resource('empresas', EmpresaController::class);
    Route::resource('productos', ProductoController::class);
});