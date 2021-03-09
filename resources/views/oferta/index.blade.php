@extends('layouts.layout')

@section('title', 'ofertas')

@section('css')
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<!--css Date Picker-->
<link rel="stylesheet" href="/css/bootstrap-datepicker.standalone.css">

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
              <i class="fa fa-align-justify"></i> Ofertas
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
                    <th>descuento</th>
                    <th>fecha inicio</th>
                    <th>fecha fin</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($ofertas as $oferta)
                  <tr>
                    {{-- <td>{{$oferta['id']}}</td> --}}
                    <td>{{$oferta['descuento']}}</td>
                    <td>{{$oferta['periodo_inicio']}}</td>
                    <td>{{$oferta['periodo_fin']}}</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                          data-toggle="dropdown">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          {{-- <a class="dropdown-item editbtn">Editar</a> --}}
                          <a class="dropdown-item" href="#" onclick="editar({{$oferta}})">Editar</a>
                          <a class="dropdown-item" href="/inventario/ofertas/estado/{{$oferta['id']}}">
                            @if ($oferta['condicion'])
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

@include('oferta.addmodal')

{{-- @include('oferta.edit') --}}

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

<script src="https://cdnjs.cloudflare.com/ajax//popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--Obligatorio que la libreria datepicker este en el footer justo despues de los js de bootstrap para no causar conflicto-->
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/bootstrap-datepicker.es.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  }); 

  function editar(oferta){
    $('#editmodal').modal('show');
    $('.modal-title').text('Editar oferta')
    $('.fid').val(oferta['id']);
    $('.fnombre').val(oferta['nombre']);
  }

  function crear(){
    $('#addmodal').modal('show');
    $('.modal-title').text('Nueva oferta');
    $('.fid').val('');
    $('.fnombre').val('');
  }  
</script>
<script>
  $(document).ready(function() {

  $('#boton-modal').on('click', function() {

      //El metodo .modal(), se utiliza para abrir la ventana modal de bootstrap 4
      $('#modal-date').modal();

  })

  $('#inicio').datepicker({
      language: "es",
      todayBtn: "linked",
      clearBtn: true,
      format: "yyyy/mm/dd",
      multidate: false,
      todayHighlight: true

  });

  $('#fin').datepicker({
      language: "es",
      todayBtn: "linked",
      clearBtn: true,
      format: "yyyy/mm/dd",
      multidate: false,
      todayHighlight: true

  });

  })
</script>

@endsection

</body>