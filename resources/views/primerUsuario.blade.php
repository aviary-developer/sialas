<?php  $a=1;?>
<!DOCTYPE html>
<html>
    <head>
        <title>WB</title>

        @include('librerias')
    </head>
<body>
  <div class="contenido">
    
<div class="panel">
  <div class="enc">
    <h2>Usuarios</h2>
    <h3 id="txt">|Primer usuario</h3>
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