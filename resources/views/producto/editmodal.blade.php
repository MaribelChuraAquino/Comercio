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
                        <select class="form-control fcategoria_id" name="categoria_id" id="inputCategoria_id"
                            style="width: 100%;">
                            <option value="">Seleccionar categoria</option>
                            @foreach ($categorias as $categoria)
                            <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Marca</label>
                        <select class="form-control fmarca_id" name="marca_id" id="inputMarca_idadd"
                            style="width: 100%;">
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