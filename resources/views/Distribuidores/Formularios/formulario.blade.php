<table>
	{!!Form::label('LNombre','Nombre:')!!}
	{!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre:'])!!}

	{!!Form::label('LTelefono','Teléfono:')!!}
	{!!Form::text('telefono',null,['placeholder'=>'Ingrese teléfono:'])!!}

	{!!Form::label('LEmail','Email:')!!}
	{!!Form::text('email',null,['placeholder'=>'Ingrese correo:'])!!}

	{!!Form::label('LDireccion','Dirección:')!!}
	{!!Form::text('direccion',null,['placeholder'=>'Ingrese dirección:'])!!}

	{!!Form::label('LEstado','Estado:')!!}
	{!!Form::text('estado',null,['placeholder'=>'Seleccione estado:'])!!}
</table>