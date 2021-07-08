<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\UbicacioneController;
use Illuminate\Foundation\Application;
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
// Auth
Route::get('register', function () {
    return view('login');
})->name('register')->middleware('auth');

Route::post('register', function () {
    return view('login');
})->name('register')->middleware('auth');

Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');
    
Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    
Route::get('/',[DashboardController::class,'index'])
    ->name('/')
    ->middleware('auth');

Route::get('/dashboard', [DashboardController::class,'index'])
    ->name('dashboard')
    ->middleware('auth');


/****************************************************************
 * ********************* USUARIOS *******************************
 ****************************************************************/

// Route::get('usuarios', [UserController::class,'index'])->name('usuarios.index');
// Route::get('usuarios-view', [UserController::class,'user_view'])->name('usuario.view');
// Route::get('usuarios/{user}/edit', [UserController::class,'edit'])->name('usuario.edit');
// Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuario.update');
// Route::get('usuarios/nuevo', [UserController::class, 'create'])->name('usuario.create');
// Route::post('usuarios', [UserController::class, 'store'])->name('usuario.store');
// Route::get('usuario/search', [UserController::class,'search'])
// ->middleware('auth');


Route::get('usuarios', [UserController::class,'index'])->name('usuarios.index')
->middleware('auth');
Route::get('usuarios-view', [UserController::class,'user_view'])->name('usuario.view')
->middleware('auth');
Route::get('usuarios/{user}/edit', [UserController::class,'edit'])->name('usuario.edit')
->middleware('auth');
Route::put('usuarios/{user}', [UserController::class, 'update'])->name('usuario.update')
->middleware('auth');
Route::get('usuarios/nuevo', [UserController::class, 'create'])->name('usuario.create')
->middleware('auth');
Route::post('usuarios', [UserController::class, 'store'])->name('usuario.store')
->middleware('auth');
Route::get('usuario/search', [UserController::class,'search'])
->middleware('auth');

/**
 * PARTIDAS
 */
Route::middleware('auth')->get('partidas', [PartidaController::class, 'index'])->name('partidas');
Route::middleware('auth')->get('partidas/create', [PartidaController::class, 'create'])->name('partidas.create');
Route::middleware('auth')->post('partidas', [PartidaController::class, 'store'])->name('partidas.store');
Route::middleware('auth')->get('partidas/{partida}/edit', [PartidaController::class, 'edit'])->name('partidas.edit');
Route::middleware('auth')->put('partidas/{partida}', [PartidaController::class, 'update'])->name('partidas.update');
Route::middleware('auth')->delete('partidas/{partida}', [PartidaController::class, 'destroy'])->name('partidas.destroy');
Route::middleware('auth')->put('partidas/{partida}/restore', [PartidaController::class, 'restore'])->name('partidas.restore');
/**
 * PROVEEDORES
 */
Route::middleware('auth')->get('proveedores', [ProveedoreController::class, 'index'])->name('proveedores');
Route::middleware('auth')->get('proveedores/create', [ProveedoreController::class, 'create'])->name('proveedores.create');
Route::middleware('auth')->post('proveedores', [ProveedoreController::class, 'store'])->name('proveedores.store');
Route::middleware('auth')->get('proveedores/{proveedor}/edit', [ProveedoreController::class, 'edit'])->name('proveedores.edit');
Route::middleware('auth')->put('proveedores/{proveedor}', [ProveedoreController::class, 'update'])->name('proveedores.update');
// Route::middleware('auth')->delete('proveedores/{partida}', [PartidaController::class, 'destroy'])->name('proveedores.destroy');
// Route::middleware('auth')->put('proveedores/{partida}/restore', [PartidaController::class, 'restore'])->name('proveedores.restore');
/**
 * AREAS
 */
Route::middleware('auth')->get('areas', [AreaController::class, 'index'])->name('areas');
Route::middleware('auth')->get('areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::middleware('auth')->post('areas', [AreaController::class, 'store'])->name('areas.store');
Route::middleware('auth')->get('areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::middleware('auth')->put('areas/{area}', [AreaController::class, 'update'])->name('areas.update');
// Route::middleware('auth')->delete('proveedores/{partida}', [PartidaController::class, 'destroy'])->name('proveedores.destroy');
// Route::middleware('auth')->put('proveedores/{partida}/restore', [PartidaController::class, 'restore'])->name('proveedores.restore');
/**
 * PUESTOS
 */
Route::middleware('auth')->get('puestos', [PuestoController::class, 'index'])->name('puestos');
Route::middleware('auth')->get('puestos/create', [PuestoController::class, 'create'])->name('puestos.create');
Route::middleware('auth')->post('puestos', [PuestoController::class, 'store'])->name('puestos.store');
Route::middleware('auth')->get('puestos/{puesto}/edit', [PuestoController::class, 'edit'])->name('puestos.edit');
Route::middleware('auth')->put('puestos/{puesto}', [PuestoController::class, 'update'])->name('puestos.update');
// Route::middleware('auth')->delete('proveedores/{partida}', [PartidaController::class, 'destroy'])->name('proveedores.destroy');
// Route::middleware('auth')->put('proveedores/{partida}/restore', [PartidaController::class, 'restore'])->name('proveedores.restore');
/**
 * UBICACIONES
 */
Route::middleware('auth')->get('ubicaciones', [UbicacioneController::class, 'index'])->name('ubicaciones');
Route::middleware('auth')->get('ubicaciones/create', [UbicacioneController::class, 'create'])->name('ubicaciones.create');
Route::middleware('auth')->post('ubicaciones', [UbicacioneController::class, 'store'])->name('ubicaciones.store');
Route::middleware('auth')->get('ubicaciones/{ubicacion}/edit', [UbicacioneController::class, 'edit'])->name('ubicaciones.edit');
Route::middleware('auth')->put('ubicaciones/{ubicacion}', [UbicacioneController::class, 'update'])->name('ubicaciones.update');
// Route::middleware('auth')->delete('proveedores/{partida}', [PartidaController::class, 'destroy'])->name('proveedores.destroy');
// Route::middleware('auth')->put('proveedores/{partida}/restore', [PartidaController::class, 'restore'])->name('proveedores.restore');