<!DOCTYPE html>
<html>
    <head>
        <title>WB</title>

        <!--<link rel="stylesheet" href="{{{ asset('/css/wb.min.css') }}}" type="text/css">-->
        {!!Html::script('js/jquery-2.2.3.min.js')!!}
        {!! Html::script('https://www.gstatic.com/charts/loader.js') !!}

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
