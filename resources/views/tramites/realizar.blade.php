@extends('layouts.plantilla')
@section('contenido')
  <div class="row">
    <div class="col-12">
      <h1>Registrar un nuevo tramite</h1>
    </div>
  </div><br>
  <form action="{{ route('tramite.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    {{-- No te faltó eso xd --}}
    <div class="row ">
      <div class="form-group col-8">
        <div class="row">
          <h4 class="col-5 text-right">Codigo:</h4>
          <div class="col-7">
            <input type="text" class="form-control" id="txtCodigoAlumno" lang="es"
              placeholder='{{ str_repeat('0', 10 - strlen(auth()->id())) . auth()->id() }}' readonly>
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
            <input onchange="getFiles()" type="file" class="custom-file-input" name="archivosAdjuntos[]" multiple id="idFileAdjunto" lang="es">
            <label class="custom-file-label " for="customFileLang">Seleccionar Archivo</label>
          </div>
        </div>
        <div class="row pt-2">
          <div id="listadoDocumentos" class="col-7 offset-5 align-self-end p-0">

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
@section('script')
  <script>
    var array_documentos = [];
    function getFiles() {
      let fInput = document.getElementById('idFileAdjunto');
        array_documentos = [...fInput.files].map(file => ({
        nombre: file.name,
        tipo: file.type,
        size: this.formatBytes(file.size),
        icon: (file.type === "application/pdf") ? "far fa-file-pdf" : "far fa-file-image",
      }));
      console.log(this.array_documentos);
      listFiles()
    }

    function listFiles(){
        let contenedor = document.getElementById('listadoDocumentos');
        contenedor.innerHTML = "";
        for(let item of array_documentos){
            contenedor.innerHTML += `
            <div class="card bg-light px-2 mb-1">
                <div class="row">
                <div class="col-9">
                    <p class="text-truncate w-100 m-0"><i class="${ item.icon }"></i> - ${ item.nombre }</p>
                </div>
                <div class="col-3 text-right">
                    ${ item.size }
                </div>
                </div>
            </div>
            `
        }
        console.log(contenedor);
        console.log(contenedor.innerHTML)
    }

    function formatBytes(bytes, decimals = 2) {
      if (bytes === 0) return '0 Bytes';

      const k = 1024;
      const dm = decimals < 0 ? 0 : decimals;
      const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

      const i = Math.floor(Math.log(bytes) / Math.log(k));

      return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }
  </script>
@endsection
