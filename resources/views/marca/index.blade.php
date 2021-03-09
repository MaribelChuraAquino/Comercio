@extends('layouts.layout')

@section('title', 'marcas')

@section('css')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">
@endsection


@section('contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    @include('notificacion')
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Marcas
              <button type="button" class="btn btn-success" href="#" onclick="crear()">
                <i class="fa fa-plus-circle mr-1"></i>Nuevo
              </button>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-striped table-sm">
                <thead>
                  <tr>
                    {{-- <th>ID</th> --}}
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($marcas as $marca)
                  <tr>
                    {{-- <td>{{$marca['id']}}</td> --}}
                    <td>{{$marca['nombre']}}</td>
                    @if ($marca['condicion'])
                    <td> <small class="badge badge-success">Activo</small> </td>
                    @else
                    <td> <small class="badge badge-danger">Desactivado</small> </td>
                    @endif
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                          data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          {{-- <a class="dropdown-item editbtn">Editar</a> --}}
                          <a class="dropdown-item" href="#" onclick="editar({{$marca}})">Editar</a>
                          <a class="dropdown-item" href="/inventario/marcas/estado/{{$marca['id']}}">
                            @if ($marca['condicion'])
                            Desactivar
                            @else
                            Activar
                            @endif
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty

                  @endforelse
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@include('marca.add')

@include('marca.edit')

<!-- ./wrapper -->
@endsection

@section('js')
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="/adminlte/plugins/toastr/toastr.min.js"></script>
<script src="/adminlte/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  }); 

  function editar(marca){
    $('#editmodal').modal('show');
    $('.modal-title').text('Editar marca')
    $('.fid').val(marca['id']);
    $('.fnombre').val(marca['nombre']);
  }

  function crear(){
    $('#addmodal').modal('show');
    $('.modal-title').text('Nueva marca');
    $('.fid').val('');
    $('.fnombre').val('');
  }  
</script>

@endsection

</body>