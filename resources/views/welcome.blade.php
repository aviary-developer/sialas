<!DOCTYPE html>
<html>
    <head>
        <title>WB</title>

        <link rel="stylesheet" href="{{{ asset('/css/wb.min.css') }}}" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body><header>
      <nav>
        <div>
          <li class="mhome"><img src="../public/img/WB/general/WB.svg" alt="Logo" class="logoInicio" /></li>
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
      <div class="container">
        <div class="content">
          {!! Form::open(['url' => '#']) !!}
          {!!Form::submit('Soy Un Botón')!!}
          <?php $fecha= new Carbon\Carbon;
          echo $fecha->now();?>
          {!! Form::close() !!}
          <div class="title">SIALAS</div>
          <div class="title">by</div>
          <div class="title">Laravel 5</div>
        </div>
      </div>
    </div>
    <footer>
      <p>
        Western Bluebird ~ UES-FMP 2016
      </p>
    </footer>
    </body>
</html>
