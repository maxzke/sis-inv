<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
//Route::middleware('auth')->get('partidas/search', [PartidaController::class,'search']);
Route::middleware('auth')->get('partidas', [PartidaController::class, 'index'])->name('partidas');
Route::middleware('auth')->get('partidas/create', [PartidaController::class, 'create'])->name('partidas.create');
Route::middleware('auth')->post('partidas', [PartidaController::class, 'store'])->name('partidas.store');
Route::middleware('auth')->get('partidas/{partida}/edit', [PartidaController::class, 'edit'])->name('partidas.edit');
Route::middleware('auth')->put('partidas/{partida}', [PartidaController::class, 'update'])->name('partidas.update');
Route::middleware('auth')->delete('partidas/{partida}', [PartidaController::class, 'destroy'])->name('partidas.destroy');
Route::middleware('auth')->put('partidas/{partida}/restore', [PartidaController::class, 'restore'])->name('partidas.restore');