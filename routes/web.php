<?php

use App\Http\Controllers\TipoTramiteController;
use App\Http\Controllers\TramiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\TipoTramite;
use App\Models\Tramite;

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
    $tramites = TipoTramite::all();
    return view('index',compact('tramites'));
})->name('inicio');
// Route::get('login', function () {
//     return view('login');
// });

Route::get('/login',[UserController::class,'showlogin'])->name('login');
Route::view('bienvenido','bienvenido')->middleware('auth');
// Route::post('/identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('identificacion',[UserController::class,'verificalogin'])->name('identificacion');
Route::post('/logout',[UserController::class,'salir'])->name('logout');

//Tramiteshh
Route::get('tramites/ver', [TramiteController::class,'index'])->name('vertramites');
Route::post('tramites', [TramiteController::class,'store'])->name('tramite.store');
Route::get('tramites/registrar', [TramiteController::class,'create'])->name('rtramites');
Route::get('tramites/gestionar', [TramiteController::class,'gestion'])->name('gtramites');
Route::get('tramites/ver/{codigo}', [TramiteController::class, 'show'])->name('vtramites');
Route::get('tramites/revisar/{codigo}', [TramiteController::class, 'show2'])->name('tramite.revisar');
Route::put('tramites/{id}' , [TramiteController::class , 'estado'])->name('tramite.estado');

Route::get('tramites/agregar',[TipoTramiteController::class,'create'])->name('tipoTramite.create');
Route::post('tramites/guardar',[TipoTramiteController::class,'store'])->name('tipoTramite.store');


