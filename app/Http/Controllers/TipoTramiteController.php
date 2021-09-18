<?php

namespace App\Http\Controllers;

use App\Models\TipoTramite;
use Illuminate\Http\Request;
use App\Models\Tramite;
use Illuminate\Support\Facades\DB;
use Exception;

class TipoTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tramites.nuevoTramite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $t_cont = 0;
        $codigoTramite = str_repeat('0',5 -strlen(TipoTramite::count() + 1)).(TipoTramite::count() + 1);
        $archivo = $request->file('archivosAdjuntos');
        $nombreRuta = $codigoTramite.'-'.(++$t_cont).'.'.$archivo->guessClientExtension();
        $nombre = $archivo->getClientOriginalName();

        DB::beginTransaction();
        try{

            $archivo->storeAs('formatos',$nombre,'s3');

            $tramite = new TipoTramite();
            $tramite->descripcion = $request->descripcion;
            $tramite->ruta = 'formatos/'.$nombre;
            $tramite->nombreArchivo = $nombre;
            $tramite->Requisitos = $request->requisito;
            $tramite->save();

            DB::commit();

            return redirect()->route('rtramites');

        }catch(Exception $e){
            DB::rollback();
            dd($e->getMessage());
        }
        exit();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
