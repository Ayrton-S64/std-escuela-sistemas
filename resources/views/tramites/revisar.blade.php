@extends('layouts.plantilla')
@section('contenido')
  <div class="row align-items-center card flex-row p-3 m-2">
    <div class="col-6">
      <div class="row">
        <div class="col">
          <h3><strong>Numero de documento: </strong></h3>
          <td>{{ $tramite->codigo }}</td>
        </div>
      </div>
      <div class="row justify-content-center ">
        <div class="col">
          <h3><strong>Tipo de tramite:</strong> </h3>
          <td>{{ $tramite->tipo_tramite->descripcion }}</td>
        </div>
      </div>
      <div class="row justify-content-center ">
        <div class="col">
          <h3><strong>Tramite:</strong></h3>
          <td>{{ $tramite->razon }}</td>
        </div>
      </div>
      <div class="row justify-content-center ">
        <div class="col">
          <h3><strong>Estado:</strong></h3>
          <td>{{ $tramite->estado_tramite->descripcion }}</td>
        </div>
      </div>
    </div>
    <div class="col-6 border-left pl-3">
      <form action="{{ route('tramite.estado', $tramite->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="estado" id="txtEstado" hidden>
        <div class="form-group">
          <label for="">Observación:</label>
          <textarea @if ($tramite->estado !=1)
              readonly
          @endif required name="observacion" id="txtObservacion" class="form-control" rows="6">{{$tramite->observacion}}</textarea>
        </div>
        @if ($tramite->estado == 1)
          <div class="form-group">
            <div class="row justify-content-around">
              <button data-estado="2" onclick="asignarEstado(2)" class="btn btn-success">Aceptar</button>
              <button data-estado="3" onclick="asignarEstado(3)" class="btn btn-danger">Rechazar</button>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <h4 class="col-5 text-right">Documentos adjuntos:</h4>
              <div class="custom-file col-7">
                <input onchange="getFiles()" type="file" class="custom-file-input" accept=".pdf,.jpeg,.jpg"
                  name="archivosRespuesta[]" multiple id="idFileAdjunto" lang="es">
                <label class="custom-file-label " for="customFileLang">Seleccionar Archivo</label>
              </div>
            </div>
            <div class="row pt-2">
              <div id="listadoDocumentos" class="col-7 offset-5 align-self-end p-0">

              </div>
            </div>
          </div>
        @endif
      </form>
    </div>

  </div>
  <div class="row">
    <div class="col-12 ">
      <h4>Documentos Adjuntos:</h4>
    </div>
    <div class="col-12">
      <table class="table table-striped">
        @foreach ($tramite->documentos as $documento)
          <td>
            <div>
              <a target="__blank" href="{{ route('descargar', ['carpeta'=>'documentos','archivo'=>$documento]) }}">
                <i class="fab fa-file-pdf"></i>
                {{ $documento->nombreArchivo }}
              </a>
            </div>
          </td>
        @endforeach
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
        <a class="btn btn-secondary" href="{{ route('gtramites') }}">
            Volver
        </a>
    </div>
@endsection
@section('script')
  <script>
    function asignarEstado(estado) {
      document.getElementById('txtEstado').value = estado;
    }
  </script>
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
