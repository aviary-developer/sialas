<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('caja_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LCaja","Caja:")!!}

		 <div class="alerta-errores">
			@foreach ($errors->get('banco_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LBanco","Banco:")!!}

		 <div class="alerta-errores">
			@foreach ($errors->get('monto') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("Lmonto","Monto: $")!!}

	</div>
</div>
