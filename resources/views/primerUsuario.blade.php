<!DOCTYPE html>
<html>
    <head>
        <title>WB</title>

        <!--<link rel="stylesheet" href="{{{ asset('/css/wb.min.css') }}}" type="text/css">-->
        {!!Html::style('css/wb.min.css')!!}
        {!!Html::script('js/wb.js')!!}
        <!--<script type="text/javascript" src="{{{ asset('/js/wb.js') }}}"></script>-->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        {!!Html::style('libreriaSweetAlert/sweet-alert.css')!!}
        {!!Html::script('libreriaSweetAlert/sweet-alert.min.js')!!}
    </head>
<body>
  <div class="contenido">
    
<div class="panel">
  <div class="enc">
    <h2>Usuarios</h2>
    <h3 id="txt">|Nuevo</h3>
  </div>
  {!!Form::open(['route'=>'users.store','method'=>'POST'])!!}
  @include('User.Formularios.Formulario')
  {!!Form::submit('Guardar')!!}
  {!!Form::close()!!}
</div>
</div>
<footer>
      <p>
        Western Bluebird ~ UES-FMP 2016
      </p>
    </footer>
</body>

</html>