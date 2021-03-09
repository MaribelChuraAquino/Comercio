@extends('layouts.layout')

@section('title', 'productos')

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

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Productos
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default"
                data-whatever="nuevo">
                <i class="fa fa-plus-circle mr-1"></i>Nuevo
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Añadir producto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- form start -->
                      <form id="quickForm" method="POST" action="/inventario/productos">
                        @csrf
                        <div class="form-group">
                          <label for="">Categoria</label>
                          <select class="form-control" name="categoria_id" id="inputCategoria_id1" style="width: 100%;">
                            <option value="">Seleccionar categoria</option>
                            @foreach ($categorias as $categoria)
                          <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Marca</label>
                          <select class="form-control" name="marca_id" id="inputMarca_id" style="width: 100%;">
                            <option value="">Seleccionar marca</option>
                            @foreach ($marcas as $marca)
                          <option value="{{$marca['id']}}">{{$marca['nombre']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Cod</label>
                          <input name="cod" class="form-control" placeholder="Ingrese cod">
                        </div>
                        <div class="form-group">
                          <label>Nombre</label>
                          <input name="nombre" class="form-control" placeholder="Ingrese nombre">
                        </div>
                        <div class="form-group">
                          <label>Descripcion</label>
                          <textarea name="descripcion" class="form-control" placeholder="Ingrese descripcion"></textarea>
                        </div>

                        <!-- /.card-body -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>

                      </form>
                    </div>

                  </div>
                </div>
              </div>
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
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($productos as $producto)
                  <tr>
                    <td></td>
                    <td>{{$producto['cod']}}</td>
                    <td>{{$producto['nombre']}}</td>
                    <td>{{$producto['categoria'] }}</td>
                    <td>{{$producto['marca']}}</td>
                    <td>{{$producto['precio_venta']}}</td>
                    @if ($producto['estado'])
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
                          <a class="dropdown-item" href="#" onclick="editar({{$producto}})">Editar</a>
                          <a class="dropdown-item" href="/inventario/productos/estado/{{$producto['id']}}">
                            @if ($producto['estado'])
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

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form id="quickForm1" method="POST" action="/inventario/productos">
          @csrf @method('put')
          <div class="form-group hidden">
            <input name="id" type="hidden" class="form-control fid">
          </div>
          <div class="form-group">
            <label for="">Categoria</label>
            <select class="form-control fcategoria_id" name="categoria_id" id="inputCategoria_id" style="width: 100%;">
              <option value="">Seleccionar categoria</option>
              @foreach ($categorias as $categoria)
            <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Marca</label>
            <select class="form-control fmarca_id" name="marca_id" id="inputMarca_idadd" style="width: 100%;">
              <option value="">Seleccionar marca</option>
              @foreach ($marcas as $marca)
            <option value="{{$marca['id']}}">{{$marca['nombre']}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Cod</label>
            <input name="cod" class="form-control fcod">
          </div>
          <div class="form-group">
            <label>Nombre</label>
            <input name="nombre" class="form-control fnombre">
          </div>
          <div class="form-group">
            <label>Descripcion</label>
            <textarea name="descripcion" class="form-control fdescripcion"></textarea>
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
</script>
<script>
  function getCategoria(){
    console.log('hola');
  }
</script>

@endsection

</body>