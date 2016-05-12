<table>
	{!!Form::label('LDistribuidor','Distribuidor:')!!}
	

	{!!Form::label('LCodigo','Código:')!!}
	{!!Form::text('codigo',null,['placeholder'=>'Ingrese código:'])!!}

	{!!Form::label('LNombre','Nombre o marca de mueble:')!!}
	{!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre:'])!!}

	{!!Form::label('LFecha','Fecha de ingreso:')!!}
	{!!Form::text('fecha',null,['placeholder'=>'Ingrese fecha:'])!!}

	{!!Form::label('LPrecio','Precio de mueble:')!!}
	{!!Form::text('precio',null,['placeholder'=>'$0.00:'])!!}

	{!!Form::label('LDepreciacion','Depreciación:')!!}
	{!!Form::text('depreciacion',null,['placeholder'=>'$0.00:'])!!}

	{!!Form::label('Ldescripcion','Descripción:')!!}
	{!!Form::text('descripcion',null,['placeholder'=>'$0.00:'])!!}

	{!!Form::label('LActivo','Activo:')!!}
	<select name="activo" id="activo">
		<option value=""> Seleccione el estado</option>
	</select>
	
	{!!Form::label('LRazon','Razón:')!!}
	{!!Form::text('razon',null,['placeholder'=>'Ingrese razón:'])!!}
</table>