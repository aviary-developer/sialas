<?php 
	$valorc = $cajaservicios->banco_id;
	$valorm = $cajaservicios->caja_id;
 ?>
<div >
 	<div>
		
		{!!Form::label('lcaja','Caja:')!!}
		<select name="caja_id">
			@foreach($c as $cajas)
				@if($valorm==$cajas->id && $valorm!=null)
					<option value="{{$cajas->id}}" selected="selected">{{$cajas->nombre}}</option>
				@else
					<option value="{{$cajas->id}}">{{$cajas->nombre}}</option>
				@endif
			@endforeach
		</select>
		
 	</div>
	<div>
		{!!Form::label('lbanco','Bancos:')!!}
		<select name="banco_id">
			@foreach($m as $bancos)
				@if($valorc==$bancos->id && $valorc!=null)
					<option value="{{$bancos->id}}" selected="selected">{{$bancos->nombre}}</option>
				@else
					<option value="{{$bancos->id}}">{{$bancos->nombre}}</option>
				@endif
			@endforeach
		</select>
		
	</div>
	{!!Form::label('lmonto','Monto:')!!}
	{!!Form::text('monto',null,['placeholder'=>'Monto a cancelar'])!!}
	{!!Form::label('ldetalle','Detalle:')!!}
	{!!Form::text('detalle',null,['placeholder'=>'Describa el detalle de esta salida'])!!}
 </div>