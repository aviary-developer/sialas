<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('nom_usuario') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('LNombre','Nombre:')!!}
		{!!Form::text('nom_usuario',null,['placeholder'=>'Ingrese su nombre:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('email') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Lcorreo','Correo electrónico:')!!}
		{!!Form::text('email',null,['placeholder'=>'Ingrese su correo:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('password') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Lcontraseña','Contraseña:')!!}
		{!!Form::password('password',null,['placeholder'=>'Ingrese su contraseña:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('salario') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Lsalario','Monto de salario:')!!}
		{!!Form::text('salario',null,['placeholder'=>'Ingrese salario:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('tipo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Ltipo','Tipo de usuario:')!!}
		<select name="tipo">
			<option value="1">Administrador</option>
			@if($a!=1)
			<option value="2">Gerente</option>
			<option value="3">Vendedor</option>
			<option value="4">Cajero</option>
			@endif
		</select>
		<div class="alerta-errores">
			@foreach ($errors->get('fecha_de_nacimiento') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Lnacimiento','Fecha de nacimiento:')!!}
		{!!Form::date('fecha_de_nacimiento',null,['placeholder'=>'Ingrese fecha:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('direccion') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Ldireccion','Dirección:')!!}
		{!!Form::text('direccion',null,['placeholder'=>'Ingrese dirección:'])!!}
	</div>
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('name') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('LnombreUsuario','Nombre de Usuario:')!!}
		{!!Form::text('name',null,['placeholder'=>'Ingrese nombre de usuario:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('codigo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Lcodigo','Asignar un código a usuario:')!!}
		{!!Form::text('codigo',null,['placeholder'=>'Ingrese código:'])!!}
		{!!Form::label('Ccontraseña','Confirmar contraseña:')!!}
		{!!Form::password('password_confirmation',null,['placeholder'=>'confirmar:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('tipo_salario') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Ltipo_salario','Tipo de salario:')!!}
		<select name="tipo_salario">
			<option value="1">Mensual</option>
			<option value="2">Quincenal</option>
			<option value="3">Semanal</option>
		</select>
		<div class="alerta-errores">
			@foreach ($errors->get('telefono') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Ltelefono','Teléfono:')!!}
		{!!Form::text('telefono',null,['placeholder'=>'Ingrese teléfono:'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('fecha_inicio') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('Lcomienzo','Fecha de inicio:')!!}
		{!!Form::date('fecha_inicio',null,['placeholder'=>'Fecha de inicio:'])!!}
	</div>
</div>
