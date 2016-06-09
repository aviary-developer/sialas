<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('nombre') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lnombre','Nombre del servicio:')!!}
		{!!Form::text('nombre',null,['placeholder'=>'Nombre'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('n_recibo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lrecibo','Número de cuenta:')!!}
		{!!Form::text('n_recibo',null,['placeholder'=>'Cuenta'])!!}
	</div>
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('proveedor') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lproveedor','Proveedor:')!!}
		{!!Form::text('proveedor',null,['placeholder'=>'Proveedor'])!!}
	</div>
</div>
