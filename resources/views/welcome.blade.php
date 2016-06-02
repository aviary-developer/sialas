<!DOCTYPE html>
<html>
    <head>
        <title>WB</title>

        <!--<link rel="stylesheet" href="{{{ asset('/css/wb.min.css') }}}" type="text/css">-->
        {!!Html::script('js/jquery-2.2.3.min.js')!!}
        {!!Html::script('js/scriptVentas.js')!!}
        {!!Html::style('css/wb.min.css')!!}
        {!!Html::script('js/wb.js')!!}
        <!--<script type="text/javascript" src="{{{ asset('/js/wb.js') }}}"></script>-->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        {!!Html::style('libreriaSweetAlert/sweet-alert.css')!!}
        {!!Html::script('libreriaSweetAlert/sweet-alert.min.js')!!}
        {!!Html::style('jqueryModal/jquery.modal.css')!!}
        {!!Html::script('jqueryModal/jquery.modal.js')!!}
    </head>
    <body><header>
      <nav>
        <div>
          <div class="doption">
            <li class="mhome"><img src ={!! asset('img/WB/general/WB.svg') !!} alt="Logo" class="logoInicio" /></li>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Venta
              </a>
            </li>
            <div class="lista">
              <a href='#'>Venta</a>
              <a href={!! asset('/clientes') !!}>Clientes</a>
            </div>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Compra
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/compras/create') !!}>Nuevo Pedido</a>
              <a href={!! asset('/proveedores') !!}>Proveedores</a>
            </div>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Inventario
              </a>
            </li>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Administración
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/users') !!}>Usuarios</a>
              <a href={!! asset('/cuentas') !!}>Catalogo</a>
            </div>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Configuración
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/cajas') !!}>Cajas</a>
              <a href={!! asset('/bancos') !!}>Bancos</a>
              <a href={!! asset('/productos') !!}>Productos</a>
              <a href={!! asset('/mobiliarios') !!}>Mobiliarios</a>
              <a href={!! asset('/servicios') !!}>Servicios</a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="separador"></div>
    <div class="contenido">
      @yield('layout')
    </div>
    <footer>
      <p>
        Western Bluebird ~ UES-FMP 2016
      </p>
    </footer>
    </body>
</html>
