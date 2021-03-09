@extends('layouts.layout')

@section('contenido')
<div class="content-wrapper">
    <div class="mr-4 ml-4">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Añadir producto</h2>
        </div>
        <div class="">
            <!-- form start -->
            <form id="quickForm" method="POST" action="/inventario/productos" enctype="multipart/form-data">
            @csrf
            
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
            <div class="form-group">
                <label>Precio</label>
                <input type="number" name="precio_venta" class="form-control" placeholder="Ingrese precio_venta">
            </div>
            <div class="form-group col-md-4">
                <input type="file" name="imagen" accept="image/*">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Categoria</label>
                    <select class="form-control" name="categoria_id" id="inputCategoria_id1" style="width: 100%;">
                    <option value="">Seleccionar categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Marca</label>
                    <select class="form-control" name="marca_id" id="inputMarca_id" style="width: 100%;">
                    <option value="">Seleccionar marca</option>
                    @foreach ($marcas as $marca)
                    <option value="{{$marca['id']}}">{{$marca['nombre']}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Oferta</label>
                    <select class="form-control" name="oferta_id" id="inputOferta_id" style="width: 100%;">
                    <option value="">Sin oferta</option>
                    @foreach ($ofertas as $oferta)
                    <option value="{{$oferta['id']}}">-{{$oferta['descuento']}}%</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input type="file" name="imagenes[]" accept="image/*" multiple="">
                </div>
            </div>
            <!-- /.card-body -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>

    </div>
</div>
@endsection