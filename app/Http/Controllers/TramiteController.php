<?php

namespace App\Http\Controllers;

use App\Models\DocumentoTramite;
use App\Models\TipoTramite;
use App\Models\Tramite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Builder\Trait_;

use function PHPSTORM_META\map;
use function PHPUnit\Framework\returnSelf;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tramites = Tramite::where('usuarioRegistro', '=', auth()->id())->get();
        $codigo = auth()->id();

        // dd($tramites);

        // $tramites = Tramite::all();
        return view('tramites.ver', compact('tramites'));
    }
    public function gestion()
    {
        // if($_SESSION['user_rol']==1){
        //     $tramites = Tramite::where('usuarioRegistro','=',$_SESSION['user_id']);
        // }else{
        $tramites = Tramite::all();

        return view('tramites.gestionar', compact('tramites'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposTramites = TipoTramite::all();
        return view('tramites.realizar', compact('tiposTramites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $t_cont = 0;
        $codigoTramite = str_repeat('0', 5 - strlen(Tramite::count() + 1)) . (Tramite::count() + 1);
        $archivo = $request->file('archivosAdjuntos');
        dd($archivo);
        $nombreRuta = $codigoTramite . '-' . (++$t_cont) . '.' . $archivo->guessClientExtension();
        $nombre = $archivo->getClientOriginalName();


        DB::beginTransaction();

        try {
            $tramite = new Tramite();
            $tramite->codigo = $codigoTramite;
            $tramite->tipoTramite = $request->tipoTramite;
            $tramite->fechaRegistro = now()->format('Y-m-d');
            $tramite->estado = 1;
            $tramite->observacion = '';
            $tramite->razon = $request->txtRazon;
            $tramite->usuarioRegistro = auth()->id();
            $tramite->save();

            $archivo->storeAs('documentos', $nombreRuta, 's3');

            $Documento = new DocumentoTramite();
            $Documento->idTramite = $tramite->id;
            $Documento->ruta = 'documentos/' . $nombreRuta;
            $Documento->nombreArchivo = $nombre;
            $Documento->save();

            DB::commit();

            return redirect()->route('vertramites'); // sabes como agregar el ->with()}

        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
        exit();

        //envia al listado creo.
    }
    // no idea

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tramite  $tramite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tramite = Tramite::find($id);

        return view('tramites.revisar', compact('tramite'));
    }
    public function show2($id)
    {
        $tramite = Tramite::find($id);

        $data = Storage::disk('s3')->response($tramite->documentos[0]->ruta);

        // dd($data);

        return view('tramites.ver2', compact('tramite', $data));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tramite  $tramite
     * @return \Illuminate\Http\Response
     */
    public function edit(Tramite $tramite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tramite  $tramite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tramite $tramite)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tramite  $tramite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tramite $tramite)
    {
        //
    }

    public function estado(Request $request, $id)
    {

        $tramite = Tramite::find($id);
        $tramite->estado = $request->estado;
        $tramite->observacion = $request->observacion;
        $tramite->save();

        return redirect()->route('gtramites');
    }
}
