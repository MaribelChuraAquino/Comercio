@extends('layouts.layout2')

@section('contenido')
{{-- <div class="content-wrapper"> --}}
    <div class="content">
        <div class="container">
        <div class="album py-5">
                <div class="row">
                    <div class="col">
                        <h1>Catalogo</h1>
                    </div>
                    <div class="d-flex flex-col-reverse col-md-2">
                        <form action="{{ route('productos.buscar') }}">
                        @csrf 
                            <select class="form-control" name="ordenar" style="width: 100%;">
                                <option value="">Ordenar por</option>
                                <option value="nombre">Nombre</option>
                                <option value="precio_venta">Precio</option>
                                <option value="created_at">Recientes</option>
                            </select>
                            <input type="hidden" value="2" name="categoria">
                        </form>   
                    </div>
                </div>
                <div class="row" align="center">
                    @forelse ($productos as $producto)
                        @include('components.product_card')
                    @empty  
                        <h1 class="text-muted">No se encontraron resultados a su busqueda!!!</h1>
                    @endforelse
                </div>
            </div>  
        </div><!-- /.container-fluid -->
    </div>
{{-- </div> --}}
@endsection
@section('js')
    <script>
        function get(){
            console.log('hola');
        }
    </script>
@endsection