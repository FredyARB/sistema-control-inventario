<?php

use App\Http\Controllers\AdministrarCajaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HistorialCajaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoPerecederoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('usuario',UsuarioController::class);
    Route::resource('productos',ProductoController::class);
    Route::resource('producto-perecederos',ProductoPerecederoController::class);
});

Route::group([ 'prefix' => 'administrar-caja', 'middleware' => ['auth:sanctum']],function(){
    Route::get('/',[AdministrarCajaController::class,'index'])->name('administrar-caja.index');
    Route::get('/abrir-caja-vista',[AdministrarCajaController::class,'vistaAbrirCaja'])->name('Abrir Caja');
    Route::post('/abrir-caja',[AdministrarCajaController::class,'controlAbrirCaja'])->name('administrar-caja.abrir-caja');
    Route::get('/cerrar-caja-vista',[AdministrarCajaController::class,'vistaCerrarCaja'])->name('Cerrar Caja');
    Route::post('/cerrar-caja',[AdministrarCajaController::class,'controlCerrarCaja'])->name('administrar-caja.cerrar-caja');
});

Route::group([ 'prefix' => 'historial-cajas', 'middleware' => ['auth:sanctum']],function(){
    Route::get('/',[HistorialCajaController::class,'index'])->name('historial-cajas.index');
});

Route::group([ 'prefix' => 'venta', 'middleware' => ['auth:sanctum']],function(){
    Route::get('/',[VentaController::class,'index'])->name('Listado Ventas');
    Route::get('/nueva',[VentaController::class,'create'])->name(' Nueva Venta');
    Route::get('/anular',[VentaController::class,'anular'])->name('Anular Venta');
});

Route::group([ 'prefix' => 'cliente', 'middleware' => ['auth:sanctum']],function(){
    Route::get('/',[ClienteController::class,'index'])->name('Listado Clientes');
});


