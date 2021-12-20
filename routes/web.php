<?php

use App\Http\Controllers\TipoTramiteController;
use App\Http\Controllers\TramiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\DocumentoTramite;
use App\Models\TipoTramite;
use App\Models\Tramite;
use Illuminate\Support\Facades\Storage;

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

Route::get('/download/{carpeta}/{archivo}', function($carpeta,$archivo) {
    if($carpeta=='documentos'){
        $archivo = DocumentoTramite::find($archivo);
    }else if($carpeta == 'formatos'){
        $archivo = TipoTramite::find($archivo);
    }



	try {
        // dd($archivo);
        // exit();
		$s3Client = Storage::cloud()->getAdapter()->getClient();
		$stream = $s3Client->getObject([
            'Bucket' => env('AWS_BUCKET'),
			'Key'    => $archivo->ruta
		]);

        $respuesta = response($stream['Body'], 200)->withHeaders([
            'Content-Type'        => $stream['ContentType'],
			'Content-Length'      => $stream['ContentLength'],
			'Content-Disposition' => 'inline; filename="' . $archivo->nombreArchivo . '"'
		]);

        // dd($respuesta);
		return $respuesta;

	}  catch (S3Exception $e) {
		abort( 401, 'The requested file not exists');
	} catch (AwsException $e) {
		abort( 401, 'An error as ocurred');
	}
})->name('descargar');

