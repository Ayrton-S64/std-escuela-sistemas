@extends('layouts.plantilla')
@section('contenido')
  <div class="row">
      <div class="col-12">
          <h1>Registrar un nuevo tramite</h1>
      </div>
  </div><br>
<form  action="{{route('tipoTramite.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    {{-- No te faltó eso xd ... en que estas?:'v ... ando buscando los tramites ...listo que bue n chat...hay que no olvidar de borrarlo XD--}}
    {{-- falta el registro d enuevos tramites, bacán , yo voy viendo el registro de 
        tramites mientras tu buscar para ir cambiando la bd, que me olvide dices :v --}}
  <div class="row ">
    <div class="form-group col-8">
        <div class="row">
            <h4 class="col-5 text-right">Nombre Tramite:</h4>
            <div class="col-7">
                <input type="text" class="form-control" id="txtCodigoAlumno" name="descripcion">
            </div>
        </div>
    </div>

    <div class="form-group col-8" style="height: fit-content">
        <div class="row">
            <h4 class="col-5 text-right">Requisitos:</h4>
             <div class="custom-file col-7" style="height: fit-content">
                <textarea class="form-control" name="requisito" id="txtRazon" rows="4">

                </textarea>
            </div> 
            <h4 class="col-5 text-right">Archivo:</h4>
                <div class="custom-file col-7">
                    <input type="file" class="custom-file-input" name="archivosAdjuntos" id="idFileAdjunto" lang="es">
                    <label class="custom-file-label " for="customFileLang">Seleccionar Archivo</label>
                  </div>
            
        </div>
    </div>

  </div>
  <div class="row justify-content-center">
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
  </div>
  
  

</form>


@endsection
