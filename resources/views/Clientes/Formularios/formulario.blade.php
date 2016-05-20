<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('nombre') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LNombre','Nombre:') !!}
		{!! Form::text('nombre',null,['placeholder'=>'Ingresar Nombre']) !!}
		<div class="alerta-errores">
			@foreach ($errors->get('dui') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LDui','Dui:') !!}
		{!! Form::text('dui',null,['placeholder'=>'Ingresar Dui']) !!}
		<div class="alerta-errores">
			@foreach ($errors->get('correo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LCorreo','Correo Electrónico:') !!}
		{!! Form::text('correo',null,['placeholder'=>'Ingresar Correo Electrónico']) !!}
		<div class="alerta-errores">
			@foreach ($errors->get('direccion') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LDireccion','Dirección:') !!}
		{!! Form::textarea('direccion',null,['placeholder'=>'Ingresar Dirección', 'rows'=>'4']) !!}
	</div>
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('apellido') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LApellido','Apellido:') !!}
		{!! Form::text('apellido',null,['placeholder'=>'Ingresar Apellido']) !!}
		<div class="alerta-errores">
			@foreach ($errors->get('nit') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LNit','Nit:') !!}
		{!! Form::text('nit',null,['placeholder'=>'Ingresar Nit']) !!}
		<div class="alerta-errores">
			@foreach ($errors->get('telefono') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!! Form::label('LTelefono','Teléfono:') !!}
		{!! Form::text('telefono',null,['placeholder'=>'Ingresar Teléfono']) !!}
	</div>
</div>
