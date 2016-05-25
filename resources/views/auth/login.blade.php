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
    <h2>Ingreso</h2>
    <h3 id="txt">|Usuario</h3>
  </div>
	  {!!Form::open(['route'=>'login.store','method'=>'POST'])!!}
		  {!!Form::label('LnombreUsuario','Nombre de Usuario:')!!}
		  {!!Form::text('name',null,['placeholder'=>'Nombre de usuario'])!!}

		  {!!Form::label('Lcontraseña','Contraseña:')!!}
		  {!!Form::password('password',null,['placeholder'=>'Contraseña'])!!}
	{!!Form::submit('Ingresar')!!} 
</div>
</div>
<footer>
      <p>
        Western Bluebird ~ UES-FMP 2016
      </p>
    </footer>
</body>

</html>



  