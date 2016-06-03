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
      <option value="Descuento">Descuento  empleado</option>
		  <option value="Aportación">Aportación patrono</option>
		</select>
	</div>
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('valor') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lvalor','Valor:')!!}
		{!!Form::text('valor',null,['placeholder'=>'Valor'])!!}
    <div class="alerta-errores">
			@foreach ($errors->get('techo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('ltecho','Techo:')!!}
		{!!Form::text('techo',null,['placeholder'=>'Techo'])!!}
	</div>
</div>
