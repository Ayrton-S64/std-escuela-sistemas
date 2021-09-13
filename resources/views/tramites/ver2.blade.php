@extends('layouts.plantilla')
@section('contenido')
  <div class="row ">
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
          <td>{{ $tramite->tipoTramite }}</td>
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
          <td>{{ $tramite->estado }}</td>
        </div>
      </div>
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
              <a target="__blank" href="/storage/{{ $documento->ruta }}">
                <i class="fab fa-file-pdf"></i>
                {{ $documento->nombreArchivo }}
              </a>
            </div>
          </td>
        @endforeach
      </table>
    </div>
  </div>
@endsection
