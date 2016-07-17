<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('nombre') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lnombre','Nombre:')!!}
		{!!Form::text('nombre',null,['placeholder'=>'Nombre'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('tipo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('ltipo','Tipo:')!!}
		<select  name="tipo">
		@if($bandera==0)
			@if($valor->tipo=="Descuento")
				<option value="Descuento" selected="selected">Descuento  empleado</option>
			  <option value="Aportación">Aportación patrono</option>
			@else
				<option value="Descuento">Descuento  empleado</option>
			  <option value="Aportación" selected="selected">Aportación patrono</option>
			@endif
		@else
      <option value="Descuento">Descuento  empleado</option>
		  <option value="Aportación">Aportación patrono</option>
		@endif
		</select>
	</div>
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('valor') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lvalor','Porcentaje (%):')!!}
		{!!Form::text('valor',null,['placeholder'=>'Valor'])!!}
    <div class="alerta-errores">
			@foreach ($errors->get('techo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('ltecho','Techo (si no posee dejar vacío):')!!}
		{!!Form::text('techo',null,['placeholder'=>'$'])!!}
	</div>
</div>
