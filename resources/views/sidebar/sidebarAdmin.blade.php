<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item @yield('activar_menu')">
              <a href="/dashboard" class="nav-link  {{(Request::is('dashboard')? 'active' : '') }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-danger">Nuevos</span>
                </p>
              </a>
            </li>
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{(Request::is('inventario/*')? 'menu-open' : '') }}">
            <a href="#" class="nav-link {{(Request::is('inventario/*')? 'active' : '') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inventario
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inventario/categorias" class="nav-link {{ (Request::is('inventario/categorias')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categoria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inventario/marcas" class="nav-link {{ (Request::is('inventario/marcas')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marca</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inventario/ofertas" class="nav-link {{ (Request::is('inventario/ofertas')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Oferta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inventario/productos" class="nav-link {{ (Request::is('inventario/productos')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Producto</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item has-treeview {{(Request::is('ingresos/*')? 'menu-open' : '') }}">
            <a href="#" class="nav-link {{(Request::is('ingresos/*')? 'active' : '') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Ingresos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ingresos/ventas" class="nav-link {{(Request::is('ingresos/ventas')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ingresos/clientes" class="nav-link {{(Request::is('ingresos/clientes')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{(Request::is('egresos/*')? 'menu-open' : '') }}">
            <a href="#" class="nav-link {{(Request::is('egresos/*')? 'active' : '') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Egresos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/egresos/compras" class="nav-link {{(Request::is('egresos/compras')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/egresos/proveedores" class="nav-link {{(Request::is('egresos/proveedores')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedor</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{(Request::is('acceso/*')? 'menu-open' : '') }}">
            <a href="#" class="nav-link {{(Request::is('acceso/*')? 'active' : '') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Acceso
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/acceso/usuarios" class="nav-link {{(Request::is('/acceso/usuarios')? 'active' : '') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/acceso/roles" class="nav-link" {{(Request::is('/acceso/roles')? 'active' : '') }}>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li> --}}
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>