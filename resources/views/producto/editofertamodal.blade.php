<div class="modal fade" id="editofertamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Oferta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form id="quickForm1" method="POST" action="/inventario/productos/agregarofertas">
          @csrf @method('put')
          <div class="form-group hidden">
            <input name="id" type="hidden" class="form-control fid">
          </div>
          <div class="form-group">
            <label for="">Oferta</label>
            <select class="form-control foferta_id" name="oferta_id" id="inputoferta_id" style="width: 100%;">
              <option value="">Seleccionar oferta</option>
              @foreach ($ofertas as $oferta)
                @if ($oferta->id == 1)
                  <option value="{{$oferta['id']}}">Sin oferta</option>
                @else
                  <option value="{{$oferta['id']}}">{{$oferta['descuento']}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <!-- /.card-body -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>