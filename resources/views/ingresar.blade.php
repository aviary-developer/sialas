 {!!Form::open(['route'=>'users.store','method'=>'POST'])!!}

	{!!Form::label('LNombre','Nombre:')!!}
	{!!Form::text('name',null,['placeholder'=>'Ingrese su nombre:'])!!}

	{!!Form::label('Lcontraseña','Contraseña:')!!}
	{!!Form::text('password',null,['placeholder'=>'Ingrese su contraseña:'])!!}

	{!!Form::submit('Guardar')!!}
	
 {!!Form::close()!!}


