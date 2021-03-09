@extends('layouts.layout')

@section('title', 'marcas')

@section('css')
<meta name="csfr-token" content="{{ csrf_token() }}" />
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

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Marcas
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"
                data-whatever="nuevo">
                <i class="fa fa-plus-circle mr-1"></i>Nuevo
              </button>

              <!-- Modal -->
              {{-- @include('components.modal') --}}
              <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Añadir marca</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- form start -->
                      <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombreenviar" class="form-control nombre" placeholder="Nombre...">
                      </div>
                      <!-- /.card-body -->
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" onclick="guardar()">Guardar</button>

                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="marcas" class="table table-striped table-sm">
                <thead>
                  <tr>
                    {{-- <th>ID</th> --}}
                    <th>nombre</th>
                    <th>condicion</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
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

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form id="quickForm1" method="POST" action="/inventario/marcas">
          @csrf @method('put')
          <div class="form-group hidden">
            <input name="id" type="hidden" class="form-control fid">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input name="nombre" class="form-control fnombre">
          </div>
          <!-- /.card-body -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
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
  $(document).ready(function(){
      $("#marcas").DataTable({
        "responsive": true,
        "autoWidth": false,
        "serverSide": true,
        "ajax": "{{ url('api/inventario/marcas') }}",
        "columns": [
          {data: 'nombre'},
          {data: 'activo'},
          {data: 'btn'}
        ]
      });
    }); 
</script>
{{-- <script>
  $(document).ready(function(){
    $('#marcas').DataTable({
      "serverSide": true,
      "ajax": "{{ url('inventario/marcas') }}",
      "columns": [
        {data: 'nombre'}
        {data: 'condicion'}
      ]
    });
  });
</script> --}}
<script>
  function editar(marca){
    var cat =  marca;
    console.log(cat);

    $('#editmodal').modal('show');
    $('.fid').val(cat['id']);
    $('.fnombre').val(cat['nombre']);
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attri('content')
    }
  });

  $(".btnenviar").click(function(e){
    console.log('entro a btn enviar');
    e.preventDefault();

    var nombre = $("input[name=nombre"]).val();

    $.ajax({
      type:'POST',
      url: '/inventario/categorias',
      data: nombre:nombre,
      success:function(data){
        console.log('entro');
        // mostrarMensaje(data.mensaje);
        // limpiarCampos();
      }
    });
  });

  

</script>
<script>
  function guardar(){
    // $.ajaxSetup({
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attri('content')
    //   }
    // });

    var nombre = $("input[name=nombreenviar"]).val();

    console.log($nombre);
    // $.ajax({
    //   type:'POST',
    //   url: '/inventario/categorias',
    //   data: nombre:nombre,
    //   success:function(data){
    //     console.log('entro');
    //     // mostrarMensaje(data.mensaje);
    //     // limpiarCampos();
    //   }
    // });

  }
</script>
<script>
</script>

@endsection

</body>