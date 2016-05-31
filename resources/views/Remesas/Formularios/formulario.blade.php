<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('caja_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LCaja","Caja:")!!}
		 {!!Form::select('caja_id', $TipoCaja)!!}

		 <div class="alerta-errores">
			@foreach ($errors->get('banco_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LBanco","Banco:")!!}
		 {!!Form::select('banco',$TipoBanco)!!}

		 <div class="alerta-errores">
			@foreach ($errors->get('monto') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("Lmonto","Monto: $")!!}
		 {!! Form::text('Monto',null,['placeholder'=>'Ingrese El Monto a Transferir']) !!}

		  <div class="alerta-errores">
			@foreach ($errors->get('monto') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("Ltransac","Transacción:")!!}
	        {!!Form :: radio ( "vradio", "Remesa",true,['onclick'=>'ver'])!!}Remesa
 			{!!Form :: radio ( "vradio", "Retiro",false,['onclick'=>'ver'])!!}Retiro

	</div>
			
</div>
