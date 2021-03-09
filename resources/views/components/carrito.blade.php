<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h4>Carrito de Compras</h4>
      <p>Productos agregados</p>
    </div>
    <div class="container">
        <div class="row">
           <div class="col-sm-12">
                @if (count(Cart::getContent()))
                    @foreach (Cart::getContent() as $item)
                        <div class="row">
                            <div class="col">
                                <img class="img-fluid" src="/inventario/img/{{$item->attributes->imagen}}">
                            </div>
                            <div class="col">
                                <div class="row"><span>{{$item->name}}</span></div>
                                <div class="row"><span>{{$item->quantity}}</span></div>
                                <div class="row"><span>${{number_format($item->price)}}</span></div>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-sm btn-danger">Quitar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <div class="btn btn-success btn-block">Finalizar compra</div>
                @else
                    <p>Carrito vacio</p>
                @endif
    
           </div>
           
        </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->