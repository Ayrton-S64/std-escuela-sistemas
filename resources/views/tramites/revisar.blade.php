@extends('layouts.plantilla')
@section('contenido')
<div class="row ">
   <div class="col-6">
       <div class="row">
           <div class="col"><h3><strong>Numero de documento: </strong></h3><td>{{$tramite->codigo}}</td></div>
       </div>
       <div class="row justify-content-center ">
        <div class="col"><h3><strong>Tipo de tramite:</strong> </h3> <td>{{$tramite->tipo_tramite->descripcion}}</td></div>
        </div>
        <div class="row justify-content-center ">
        <div class="col"><h3><strong>Tramite:</strong></h3><td>{{$tramite->razon}}</td> </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col"><h3><strong>Estado:</strong></h3><td>{{$tramite->estado_tramite->descripcion}}</td></div>
        </div>
   </div>
   <div class="col-6">
            @if($tramite->estado == 2 || $tramite->estado == 3)

                @else
                    <form action="{{route('tramite.estado' , $tramite->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row justify-content-around">
                            <input type="text" hidden name="estado" value="2">
                            <input type="submit" class="btn btn-success btn-lg" value="Aceptar">
                            {{-- <button type="button" class="btn btn-success btn-lg">Aceptar</button> --}}
                        </div><br>
                    </form>

                    <form action="{{route('tramite.estado' , $tramite->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row"></div><br>
                        <div class="row justify-content-around">
                            <input type="text" hidden name="estado" value="3">
                            <input type="submit" class="btn btn-danger btn-lg" value="Rechazar">
                            {{-- <button type="" class="btn btn-danger btn-lg">Rechazar</button> --}}
                        </div>
                    </form>
            @endif
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
