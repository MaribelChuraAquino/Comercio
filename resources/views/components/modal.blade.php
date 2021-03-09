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
                        <input name="nombre" class="form-control nombre" placeholder="Nombre...">
                    </div>
                    <!-- /.card-body -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnenviar" onclick="guardar()">Save</button>

            </div>

        </div>
    </div>
</div>
{{-- <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form id="quickForm" method="POST" action="/inventario/marcas">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" class="form-control" placeholder="Nombre...">
                    </div>
                    <!-- /.card-body -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>

        </div>
    </div>
</div> --}}