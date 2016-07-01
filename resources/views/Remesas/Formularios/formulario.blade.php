<?php
if($bandera==1){
	$valorb=null;
	$valorc=null;
}else{
	$valorb=$remesas->banco_id;
	$valorc=$remesas->caja_id;
}
?>
<div class="fila">
@if($bandera)
<div class="alerta-errores">
			@foreach ($errors->get('caja_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		<div id="TransaCaja">
			{!!Form::label('LCaja','Caja:')!!}
			<select name="cajaTipo">
				@foreach($TipoCaja as $ca)
					@if($valorc==$ca->id && $valorc!=null)
						<option value="{{$ca->id}}" selected="selected">{{$ca->nombre}}</option>
					@else
						<option value="{{$ca->id}}">{{$ca->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	@endif
	</div>




	


		 <div class="alerta-errores">
			@foreach ($errors->get('banco_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LBanco","Banco:")!!}
		 <select name="bancoTipo">
		 	@foreach($TipoBanco as $ban)
		 	<option value="{{$ban->id}}">
		 		{{$ban->nombre}}
		 	</option>
		 	@endforeach
		 </select>


		 <div class="alerta-errores">
			@foreach ($errors->get('monto') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("Lmonto","Monto: $")!!}
		 {!! Form::text('Monto',null,['placeholder'=>'Ingrese El Monto a Transferir']) !!}

		  <div class="alerta-errores">
			@foreach ($errors->get('transaccion') as $error)
				<br>{{$error}}
			@endforeach
		 </div>

 			<div>
	 {!!Form::label('llabel','Transacción:')!!}<br>
	 <div class="fila">
		 <div>
			 {!!Form :: radio ( "vradio", 1,true,['id'=>'efe1'])!!}
			 <label for="efe1"><span></span>Remesa</label>
		 </div>
		 <div>
			 {!!Form :: radio ( "vradio", 0,false,['id'=>'efe0'])!!}
			 <label for="efe0"><span></span>Retiro</label>
		 </div>
	 </div>
 </div>

	
			
</div>
