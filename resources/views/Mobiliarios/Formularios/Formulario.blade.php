<div class="fila">
	<div>
		{!!Form::label('LTipo','Tipo:')!!}
		<select name="idTipo" id="idTipo">
			<option value=""> Seleccione el estado</option>
		</select>
		{!!Form::label('LNombre','Nombre o marca de mobiliario:')!!}
		{!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre:'])!!}
		{!!Form::label('LDistribuidor','Distribuidor:')!!}
		{!!Form::text('idDistribuidor',null,['placeholder'=>'Ingrese distribuidor:'])!!}
		{!!Form::label('LPrecio','Precio del mobiliario:')!!}
		{!!Form::text('precio',null,['placeholder'=>'$0.00:'])!!}
		{!!Form::label('Ldescripcion','Descripción:')!!}
		{!!Form::textarea('descripcion',null,['placeholder'=>'Ingrese descripción:', 'rows'=>'3'])!!}
	</div>
	<div>
		{!!Form::label('LCodigo','Código:')!!}
		{!!Form::text('codigo',null,['placeholder'=>'Ingrese código:'])!!}
		{!!Form::label('LFecha','Fecha de ingreso:')!!}
		{!!Form::text('fecha',null,['placeholder'=>'Ingrese fecha:'])!!}
		{!!Form::label('LDepreciacion','Depreciación:')!!}
		{!!Form::text('depreciacion',null,['placeholder'=>'$0.00:'])!!}
		{!!Form::label('LEstado','Estado:')!!}
		<select name="estado" id="estado">
			<option value=""> Seleccione el estado</option>
		</select>
		{!!Form::label('LRazon','Razón:')!!}
		{!!Form::text('razon',null,['placeholder'=>'Ingrese razón:'])!!}
	</div>
</div>
