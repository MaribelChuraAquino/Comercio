<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form id="quickForm2" method="POST" action="/inventario/ofertas">
          @csrf
          <div class="form-group hidden">
            <input name="id" type="hidden" class="form-control fid">
          </div>
          <div class="form-group">
            <label>Descuento</label>
            <input type="number" name="descuento" class="form-control fdescuento" placeholder="Descuento...">
          </div>
          <div class="form-row">
            <!--row-->
            <div class="form-group col-md-6">
                <label for="Check-in">Desde</label>
                <input type="text" name="periodo_inicio" readonly="" class="form-control" id="inicio" placeholder="Fecha inicio">
            </div>
            <div class="form-group col-md-6">
                <label for="Check-out">Hasta</label>
                <input type="text" name="periodo_fin" readonly="" class="form-control" id="fin" placeholder="Fecha fin">
            </div>
          </div>
          @if ($errors->any())
              <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
              </ul>
          @endif
          <!-- /.card-body -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>