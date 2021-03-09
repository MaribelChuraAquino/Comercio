<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Añadir producto</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
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
                <div class="form-group col-md-6">
                    <label for="">Categoria</label>
                    <select class="form-control" name="categoria_id" id="inputCategoria_id1" style="width: 100%;">
                    <option value="">Seleccionar categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Marca</label>
                    <select class="form-control" name="marca_id" id="inputMarca_id" style="width: 100%;">
                    <option value="">Seleccionar marca</option>
                    @foreach ($marcas as $marca)
                    <option value="{{$marca['id']}}">{{$marca['nombre']}}</option>
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
    </div>