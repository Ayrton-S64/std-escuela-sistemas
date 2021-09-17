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
        //
        $archivo = $request->file('archivosAdjuntos');
        $nombre = $archivo->getClientOriginalName();

        DB::beginTransaction();
        try{
        
            $tramite = new TipoTramite();
            $tramite->descripcion = $request->descripcion;
            $tramite->informacion = $nombre;
            $tramite->Requisitos = $request->requisito;
            $tramite->save();
        
            $archivo->storeAs('formatos',$nombre,'public');

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
