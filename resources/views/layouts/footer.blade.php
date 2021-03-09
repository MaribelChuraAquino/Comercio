<footer class="bg-dark pt-5">
    <div class="container">
      <div class="row pb-2">
        <div class="col-md-4 col-sm-6">
          <div class="widget widget-links widget-light pb-2 mb-4">
            <h3 class="widget-title text-light">Tienda en linea</h3>
            <ul class="widget-list">
                @for ($i = 0; $i < 14; $i++)
                    <li class="widget-list-item"><a class="widget-list-link" href="{{ route('productos.catalogo.categoria', ['categoria'=>$categorias[$i]->id]) }}">{{$categorias[$i]->nombre}}</a></li>
                @endfor
              
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="widget widget-links widget-light pb-2 mb-4">
            <h3 class="widget-title text-light">Informacion de cuenta y envio</h3>
            <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="#">Su cuenta</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Tarifas y politica de envio</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Rastreo de orden</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Informacion de entrega</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Impuestos y pagos</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Lista de deseo</a></li>
            </ul>
          </div>
          <div class="widget widget-links widget-light pb-2 mb-4">
            <h3 class="widget-title text-light">Sobre nosotros</h3>
            <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="#">Acerca de la compañia</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Nuestro equipo</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Carreras</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Envios</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget pb-2 mb-4">
            <h3 class="widget-title text-light pb-1">Mantente informado</h3>
            <form class="subscription-form validate" action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126" method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate="">
              <div class="input-group flex-nowrap"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" type="email" name="EMAIL" placeholder="Your email" required="">
                <button class="btn btn-primary" type="submit" name="subscribe">Subscribirse</button>
              </div>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input class="subscription-form-antispam" type="text" name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
              </div>
              <div class="form-text text-light opacity-50">Suscríbase a nuestro boletín para recibir ofertas de descuentos anticipados, actualizaciones e información sobre nuevos productos.</div>
              <div class="subscription-status"></div>
            </form>
          </div>
          <div class="widget pb-2 mb-4">
            <h3 class="widget-title text-light pb-1">Descarga nuestra App</h3>
            <div class="d-flex flex-wrap">
              <div class="me-2 mb-2"><a class="btn-market btn-apple" href="#" role="button"><span class="btn-market-subtitle">Descarga en la </span><span class="btn-market-title">App Store</span></a></div>
              <div class="mb-2"><a class="btn-market btn-google" href="#" role="button"><span class="btn-market-subtitle">Descarga en la </span><span class="btn-market-title">Google Play</span></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>