<table>
	{!!Form::label('LNombre','Nombre:')!!}
	{!!Form::text('name',null,['placeholder'=>'Ingrese su nombre:'])!!}

	{!!Form::label('Lcorreo','Correo electrónico:')!!}
	{!!Form::text('email',null,['placeholder'=>'Ingrese su correo:'])!!}

	{!!Form::label('Lcontraseña','Contraseña:')!!}
	{!!Form::text('password',null,['placeholder'=>'Ingrese su contraseña:'])!!}

	{!!Form::label('LnombreUsuario','Nombre de Usuario:')!!}
	{!!Form::text('nom_usuario',null,['placeholder'=>'Ingrese nombre de usuario:'])!!}

	{!!Form::label('Lsalario','Monto de salario:')!!}
	{!!Form::text('salario',null,['placeholder'=>'Ingrese salario:'])!!}

	{!!Form::label('Lnacimiento','Fecha de nacimiento:')!!}
	{!!Form::text('fecha_de_nacimiento',null,['placeholder'=>'Ingrese fecha:'])!!}

	{!!Form::label('Ltelefono','Teléfono:')!!}
	{!!Form::text('telefono',null,['placeholder'=>'Ingrese teléfono:'])!!}

	{!!Form::label('Lcomienzo','Fecha de inicio:')!!}
	{!!Form::text('fecha_inicio',null,['placeholder'=>'Fecha de inicio:'])!!}

	{!!Form::label('Ldireccion','Dirección:')!!}
	{!!Form::text('direccion',null,['placeholder'=>'Ingrese dirección:'])!!}
</table>