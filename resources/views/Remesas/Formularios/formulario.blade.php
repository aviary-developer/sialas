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
<div>	
@if($bandera)

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
	
	@if($bandera)

		<div id="TransaBanco">
			{!!Form::label('LBanco','Banco:')!!}
			<select name="bancoTipo">
				@foreach($TipoBanco as $ban)
					@if($valorb==$ban->id && $valorb!=null)
						<option value="{{$ban->id}}" selected="selected">{{$ban->nombre}}</option>
					@else
						<option value="{{$ban->id}}">{{$ban->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>

		 {!!Form::label("Lmonto","Monto: $")!!}
		 {!! Form::text('Monto',null,['placeholder'=>'Ingrese El Monto a Transferir']) !!}
          <div class="fila">
	
		 <div id='rbtnTransac' class='radiosg'>
			{!!Form::label('ltransaccion','Transacción:')!!}<br>
			<div class="fila">
				<div>
					{!!Form :: radio ( "transaccion", 1,true,['id'=>'est1'])!!}
					<label for="est1"><span></span>Remesa</label>
				</div>
				<div>
					{!!Form :: radio ( "transaccion",0,false,['id'=>'est0'])!!}
					<label for="est0"><span></span>Retiro</label>
				</div>
		 </div>
		</div>
		</div>
	 @endif
	

  </div>

</div>