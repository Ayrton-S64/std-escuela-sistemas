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
