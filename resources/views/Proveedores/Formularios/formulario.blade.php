<div class="alerta-errores">
	@foreach ($errors->get('nombre') as $error)
		<br>{{$error}}
	@endforeach
</div>
{!! Form::label('LNombre','Nombre de Empresa:') !!}
{!! Form::text('nombre',null,['placeholder'=>'Ingresar Nombre De La Empresa']) !!}

<div class="alerta-errores">
	@foreach ($errors->get('contacto') as $error)
		<br>{{$error}}
	@endforeach
</div>
{!! Form::label('Lcontacto','Nombre del Contacto:') !!}
{!! Form::text('contacto',null,['placeholder'=>'Ingresar Nombre Del Contacto']) !!}

<div class="alerta-errores">
	@foreach ($errors->get('nif') as $error)
		<br>{{$error}}
	@endforeach
</div>
{!! Form::label('LNif','NIF:') !!}
{!! Form::text('nif',null,['placeholder'=>'Ingresar El Numero De Identificación Fiscal']) !!}


<div class="alerta-errores">
	@foreach ($errors->get('direccion') as $error)
		<br>{{$error}}
	@endforeach
</div>
{!! Form::label('LDireccion','Dirección:') !!}
{!! Form::text('direccion',null,['placeholder'=>'Ingresar Dirección']) !!}


<div class="alerta-errores">
	@foreach ($errors->get('correo') as $error)
		<br>{{$error}}
	@endforeach
</div>
{!! Form::label('LCorreo','Correo Electrónico:') !!}
{!! Form::text('correo',null,['placeholder'=>'Ingresar Correo Electrónico']) !!}


<div class="alerta-errores">
	@foreach ($errors->get('telefono') as $error)
		<br>{{$error}}
	@endforeach
</div>
{!! Form::label('LTelefono','Teléfono:') !!}
{!! Form::text('telefono',null,['placeholder'=>'Ingresar Teléfono']) !!}

