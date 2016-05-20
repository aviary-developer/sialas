<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('nombre') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lnombre','Tipo de servicio:')!!}
		{!!Form::text('nombre',null,['placeholder'=>'Servicio'])!!}
		<div class="alerta-errores">
			@foreach ($errors->get('n_recibo') as $error)
				<br>{{$error}}
			@endforeach
		</div>
		{!!Form::label('lrecibo','Número de factura:')!!}
		{!!Form::text('n_recibo',null,['placeholder'=>'Recibo'])!!}
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
