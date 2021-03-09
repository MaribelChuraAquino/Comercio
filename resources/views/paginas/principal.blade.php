@extends('layouts.layout2')

@section('contenido')
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://www.fiercepc.co.uk/media/wysiwyg/PC-BUNDLE-BANNER.jpg" alt="First slide" height="500">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://i0.wp.com/www.tech-critter.com/wp-content/uploads/SF360R-Banner_1200x600.jpg" alt="Second slide" height="500">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://jctech.co.za/wp-content/uploads/2020/09/asus-gaming-pcs-banner-980px-v1.jpg" alt="Third slide" height="500">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Top Navigation <small>Example 3.0</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> --}}
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row" align="center">
              @for ($i = 0; $i < 6; $i++)
                <div class="col-2">
                  <a href="{{ route('productos.catalogo.marca', ['marca'=>$marcas[$i]->id]) }}">
                    <img class="card-img-top" src="{{$marcas[$i]->imagen}}" alt="Card image cap" height="200">
                  </a>
                </div>
              @endfor               
                
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pt-5 bg-info">
      <div class="container">
        <div class="row pb-3" align="center">
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="d-flex">
              <div class="ps-3">
                <i class="fas fa-motorcycle fa-5x"></i>
                <dt class="fs-base text-light mb-1">Envio rapido y gratis</dt>
                <p class="mb-0 fs-ms text-light opacity-50">Envio gratis para compras mayores a 2000$</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="d-flex">
              <div class="ps-3">
                <i class="fas fa-box-open fa-5x"></i>
                <dt class="fs-base text-light mb-1">Garantía de productos</dt>
                <p class="mb-0 fs-ms text-light opacity-50">Productos originales y garantizados</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="d-flex">
              <div class="ps-3">
                <i class="fas fa-headset fa-5x"></i>
                <dt class="fs-base text-light mb-1">24/7 atencion al cliente</dt>
                <p class="mb-0 fs-ms text-light opacity-50">Atencion al cliente amigable 24/7</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="d-flex">
              <div class="ps-3">
                <i class="fas fa-cart-plus fa-5x"></i>
                <dt class="fs-base text-light mb-1">Puntos acumulativos</dt>
                <p class="mb-0 fs-ms text-light opacity-50">Aumenta puntos por cada una de tus compras</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
                <div class="col">
                  <h1>Productos añadidos recientemente</h1>
                </div>
                <div class="d-flex flex-col-reverse">
                  <a href="{{ route('productos.agregados_recientemente') }}">Ver todo</a>
                </div>
              </div>
              <div class="row" align="center">
                @foreach ($productosrecientes as $producto)
                    @include('components.product_card')
                @endforeach
              </div>
            </div>
          </div>
        <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
                <div class="col">
                  <h1>En oferta</h1>
                </div>
                <div class="d-flex flex-col-reverse">
                  <a href="{{ route('productos.en_oferta') }}">Ver todo</a>
                </div>
              </div>
              <div class="row" align="center">
                @foreach ($productosoferta as $producto)
                  @include('components.product_card')                    
                @endforeach
              </div>
            </div>
          </div>
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection