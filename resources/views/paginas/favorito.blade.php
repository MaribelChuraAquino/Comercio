@extends('layouts.layout2')
@section('title', 'marcas')

@section('css')
@endsection

@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @include('notificacion')
    </section>
    <section class="content">
        <div class="col" align="center">
            <h1>Lista de deseos</h1>
            <span>
                Bienvenido a su lista de deseos. A continuación se muestran todos sus productos favoritos
            </span>
        </div>
        
        <div class="album py-5 bg-light">
            <div class="row" align="center">
                @foreach ($favoritos as $favorito)
                    @foreach ($productos as $producto)
                        @if ($favorito->producto_id == $producto->id)
                            @include('components.product_card')  
                            @break 
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>    
    </section>
</div>
@endsection

@section('js')
@endsection