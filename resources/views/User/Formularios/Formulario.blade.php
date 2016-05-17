<div class="alerta-errores">
	@foreach ($errors->all() as $error)
		<br>{{$error}}
	@endforeach
</div>
<table>
	{!!Form::label('LNombre','Nombre:')!!}
	{!!Form::text('nom_usuario',null,['placeholder'=>'Ingrese su nombre:'])!!}

	{!!Form::label('Lcorreo','Correo electrónico:')!!}
	{!!Form::text('email',null,['placeholder'=>'Ingrese su correo:'])!!}

	{!!Form::label('Lcontraseña','Contraseña:')!!}
	{!!Form::password('password',null,['placeholder'=>'Ingrese su contraseña:'])!!}

	{!!Form::label('Ccontraseña','Confirmar ontraseña:')!!}
	{!!Form::password('password_confirmation',null,['placeholder'=>'confirmar:'])!!}

	{!!Form::label('LnombreUsuario','Nombre de Usuario:')!!}
	{!!Form::text('name',null,['placeholder'=>'Ingrese nombre de usuario:'])!!}

	{!!Form::label('Lsalario','Monto de salario:')!!}
	{!!Form::text('salario',null,['placeholder'=>'Ingrese salario:'])!!}

	{!!Form::label('Lnacimiento','Fecha de nacimiento:')!!}
	{!!Form::date('fecha_de_nacimiento',null,['placeholder'=>'Ingrese fecha:'])!!}

	{!!Form::label('Ltelefono','Teléfono:')!!}
	{!!Form::text('telefono',null,['placeholder'=>'Ingrese teléfono:'])!!}

	{!!Form::label('Lcomienzo','Fecha de inicio:')!!}
	{!!Form::text('fecha_inicio',null,['placeholder'=>'Fecha de inicio:'])!!}

	{!!Form::label('Ldireccion','Dirección:')!!}
	{!!Form::text('direccion',null,['placeholder'=>'Ingrese dirección:'])!!}

	{!!Form::label('Ltipo','Tipo de usuario:')!!}
	<select name="tipo">
		<option value="1">Administrador</option>
		<option value="2">Gerente</option>
		<option value="3">Vendedor</option>
		<option value="4">Cajero</option>
	</select>	
</table>