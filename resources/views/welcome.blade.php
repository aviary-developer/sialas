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
    </head>
    <body><header>
      <nav>
        <div>

          <li class="mhome"><img src ={!! asset('img/WB/general/WB.svg') !!} alt="Logo" class="logoInicio" /></li>
          <li class="moption">
            <a href="#">
              Venta
            </a>
          </li>
          <li class="moption">
            <a href="#">
              Compra
            </a>
          </li>
          <li class="moption">
            <a href="#">
              Inventario
            </a>
          </li>
          <li class="moption">
            <a href="#">
              Reporte
            </a>
          </li>
          <li class="moption">
            <a href="#">
              Administración
            </a>
          </li>
          <li class="moption">
            <a href="#">
              Configuración
            </a>
          </li>
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
