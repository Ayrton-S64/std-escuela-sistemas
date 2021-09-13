@extends('layouts.plantilla')
@section('contenido')
<div class="row" style="overflow-y: auto">
    <div class="col-12 ">
      <div class="card col-12 ">
        <div class="card-header">
          <h1 class="card-title">Tramites registrados</h1>

          <div class="card-tools">
            <div>
              <p>Buscar con Codigo de documento</p>
            </div>
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table id="tablaTramites" class="table table-head-fixed text-nowrap table-hover">
            <thead>
              <tr>
                <th>CODIGO</th>
                <th>TIPO DE DOCUMENTO</th>
                <th>FECHA</th>
                <th>ESTADO</th>
                <th>Reason</th>

                <th>VER</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($tramites as $item)
                <tr title="revisar">
                  <td>{{ $item->codigo }}</td>
                  <td>{{ $item->tipo_tramite->descripcion }}</td>
                  <td>{{ $item->fechaRegistro }}</td>
                  <td>{{ $item->estado_tramite->descripcion }}</td>
                  <td>{{ $item->razon }}</td>
                  <td>
                    <a type="button" class="btn btn-primary" href="{{ route('tramite.revisar', $item->id) }}">
                      <i class="fas fa-eye"></i>
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
