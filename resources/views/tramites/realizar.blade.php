@extends('layouts.plantilla')
@section('contenido')
  <div class="row">
      <div class="col-12">
          <h1>Registrar un nuevo tramite</h1>
      </div>
  </div><br>
<form  action="{{route('tramite.store')}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    {{-- No te faltó eso xd --}}
  <div class="row ">
    <div class="form-group col-8">
        <div class="row">
            <h4 class="col-5 text-right">Codigo de estudiante:</h4>
            <div class="col-7">
                <input type="text" class="form-control" id="txtCodigoAlumno" lang="es" placeholder='{{str_repeat('0',10 - strlen(auth()->id())).(auth()->id())}}' readonly>
            </div>
        </div>
    </div>
    <div class="form-group col-8">
        <div class="row">
            <h4 class="col-5 text-right">Tipo de tramite:</h4>
            <div class="col-7">
                <select class="form-control" id="tipoTramite" name="tipoTramite">
                  @foreach ($tiposTramites as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                  @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group col-8" style="height: fit-content">
        <div class="row">
            <h4 class="col-5 text-right">Asunto:</h4>
            <div class="custom-file col-7" style="height: fit-content">
                <textarea class="form-control" name="txtRazon" id="txtRazon" rows="4">

                </textarea>
            </div>
        </div>
    </div>
    <div class="form-group col-8">
        <div class="row">
            <h4 class="col-5 text-right">Documentos adjuntos:</h4>
            <div class="custom-file col-7">
                <input type="file" class="custom-file-input" name="archivosAdjuntos" id="idFileAdjunto" lang="es">
                <label class="custom-file-label " for="customFileLang">Seleccionar Archivo</label>
              </div>
        </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-4 text-center" style="">
      <h4></h4>
    </div>
    <div class="form-group col-4">


    </div>

  </div>
  <div class="row justify-content-center">
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>

    <a class="mx-3 btn btn-secondary" href="{{ route('vertramites') }}">
        Volver
    </a>
  </div>

</form>


@endsection
