<table>
	{!!Form::label('LIdBanco','Banco:')!!}
	{!!Form::text('id_Banco',null,['placeholder'=>'Seleccione el banco:'])!!}

	{!!Form::label('LCantidad','Monto:')!!}
	{!!Form::text('cantidad',null,['placeholder'=>'Ingrese monto:'])!!}

	{!!Form::label('LDetalle','Detalle:')!!}
	{!!Form::text('detalle',null,['placeholder'=>'Ingrese detalle:'])!!}
</table>