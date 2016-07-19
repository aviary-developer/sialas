<!DOCTYPE html>
<html>
    <head>
        <title>WB</title>

        <!--<link rel="stylesheet" href="{{{ asset('/css/wb.min.css') }}}" type="text/css">-->
        {!!Html::script('js/jquery-2.2.3.min.js')!!}
        {!! Html::script('https://www.gstatic.com/charts/loader.js') !!}

        {!!Html::script('js/scriptVentas.js')!!}
        {!!Html::script('js/jquery.maskedinput.js')!!}
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
          <!--coment@if(Auth::user()->tipo==1 || Auth::user()->tipo==2 || Auth::user()->tipo==3 || Auth::user()->tipo==4)-->
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Venta
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/ventas') !!}>Venta</a>
              <a href={!! asset('/clientes') !!}>Clientes</a>
            </div>
          </div>
          <!--coment@endif-->
          <!--coment@if(Auth::user()->tipo==1 || Auth::user()->tipo==2)-->
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Compra
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/compras') !!}>Pedidos</a>
              <a href={!! asset('/proveedores') !!}>Proveedores</a>
            </div>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Administración
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/users') !!}>Usuarios</a>
              <a href={!! asset('/remesas/create') !!}>Retiro / Remesa</a>
              <a href={!! asset('/transferencias') !!}>Tranferencia</a>
              <a href={!! asset('/prestamos') !!}>Prestamos</a>
              <a href={!! asset('/stats') !!}>Estadísticas</a>
              <a href={!! asset('/cajausuarios') !!}>Planillas</a>
              <a href={!! asset('/bitacoras') !!}>Bitacora</a>

            </div>
          </div>
          <div class = "doption">
            <li class="moption">
              <a href="#">
                Mantenimiento
              </a>
            </li>
            <div class="lista">
              <a href={!! asset('/cajas') !!}>Cajas</a>
              <a href={!! asset('/bancos') !!}>Bancos</a>
              <a href={!! asset('/productos') !!}>Productos</a>
              <a href={!! asset('/mobiliarios') !!}>Mobiliarios</a>
              <a href={!! asset('/servicios') !!}>Servicios</a>
              <a href={!! asset('/rentas') !!}>Impuesto/renta</a>
              <a href={!! asset('/descuentoaportes') !!}>Descuentos/Aportaciones</a>
            </div>
          </div>
          <!--coment@endif-->
            <!--coment@if(Auth::user()->tipo==1 || Auth::user()->tipo==2 || Auth::user()->tipo==3 || Auth::user()->tipo==4)-->
          <div class = "doption">
            <li class="moption">
              <a href={!! asset('/logout') !!}>
                Salir
              </a>
            </li>
          </div>
        <!--coment@endif-->
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
