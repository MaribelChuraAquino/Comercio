@extends('layouts.layout')

@section('title', 'productos')

@section('css')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">
<style>
  table.dataTable tbody tr.selected{background-color:#b0bed9}
</style>
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
              <i class="fa fa-align-justify"></i> Productos
              <a href="{{ route('productos.crear') }}">
                <button type="button" class="btn btn-success">
                  <i class="fa fa-plus-circle mr-1"></i>Nuevo
                </button>
              </a>
              <button id="button" class="btn btn-danger"></button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <td></td>
                    <th>Cod</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Imagenes</th>
                    <th>Precio</th>
                    <th>Oferta</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($productos as $producto)
                  <tr>
                    <td><img src="/inventario/img/{{$producto['imagen']}}" width="40" height="40"></td>
                    <td>{{$producto['cod']}}</td>
                    <td><a href={{ route('productos.mostrar', ['id'=>$producto->id]) }}>{{$producto['nombre']}}</a></td>
                    <td>{{$producto['categoria'] }}</td>
                    <td>@foreach ($producto['imagenes'] as $item)
                        <img src="/inventario/img/{{$item}}" width="40" height="40">
                    @endforeach</td>
                    <td>$ {{number_format($producto['precio_venta'])}}</td>
                    @if ($producto->oferta == 0)
                      <td>sin oferta</td>
                    @else
                      <td><small class="badge badge-danger">-{{$producto->oferta}}%</small></td>
                    @endif
                    
                    @if ($producto['condicion'])
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
                          {{-- <a class="dropdown-item" href="{{ route('productos.editar', ['id'=>$producto->id]) }}">Editar</a> --}}
                          <a class="dropdown-item" href="#" onclick="editar({{$producto}})">Editar</a>
                          <a class="dropdown-item" href="#" onclick="editarOferta({{$producto}})">Agregar oferta</a>
                          <a class="dropdown-item" href="{{ route('productos.condicion', ['id'=>$producto->id]) }}">
                            @if ($producto['condicion'])
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

@include('producto.editmodal')

@include('producto.editofertamodal')
    
@include('producto.addmodal')

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
  $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    }); 
</script>
<script>
  function editar(producto){
    var cat =  producto;

    $('#editmodal').modal('show');
    $('.fid').val(cat['id']);
    $('.fcategoria_id').val(cat['categoria_id']);
    $('.fmarca_id').val(cat['marca_id']);
    $('.fcod').val(cat['cod']);
    $('.fnombre').val(cat['nombre']);
    $('.fdescripcion').val(cat['descripcion']);
  }

  function editarOferta(producto){
    var cat =  producto;

    $('#editofertamodal').modal('show');
    $('.fid').val(cat['id']);
    $('.foferta_id').val(cat['oferta_id']);
  }
</script>
{{-- <script>
  $(document).ready(function() {
    var table = $('#example1').DataTable();
 
    $('#example1 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
      var fila = table.rows('.selected').data();
      console.log(fila);
    } );
  } );
</script> --}}

@endsection

</body>