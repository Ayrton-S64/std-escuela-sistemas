@extends('layouts.plantilla')
@section('contenido')
<style>
    .PENDIENTE{
        color: #888498;
    }

    .ACEPTADO{
        color: #4ea916
    }

    .RECHAZADO{
        color: #bf2929
    }
</style>
<div class="row" style="overflow-y: auto">
    <div class="col-12 ">
        <div class="card col-12 ">
            <div class="card-header">
              <h1 class="card-title">Tramites registrados</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table id="tablaTramites" class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>CODIGO</th>
                    <th>TRAMITANTE</th>
                    <th>TIPO DE TRAMITE</th>
                    <th>FECHA</th>
                    <th>ESTADO</th>
                    <th>OPERACIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tramites as $item)
                  <tr>
                    <td>{{$item->codigo}}</td>
                    <td>{{$item->usuario_registro->name}}</td>
                    <td>{{$item->tipo_tramite->descripcion}}</td>
                    <td>{{$item->fechaRegistro}}</td>
                    <td class="{{ $item->estado_tramite->descripcion}}"><b>{{$item->estado_tramite->descripcion}}</b></td>
                    <td>
                        <a type="button" class="btn btn-primary" href="{{route('vtramites',$item->id)}}" data-toggle="button" aria-pressed="false" autocomplete="off">
                        <i class="fas fa-eye"></i>
                        Revisar
                        </a>
                    </td>
                  </tr>

                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    </div>
</div>
@section('script')
  <script>
    $(document).ready(function() {
      $('#tablaTramites').DataTable();
    });
  </script>
@endsection
@endsection
