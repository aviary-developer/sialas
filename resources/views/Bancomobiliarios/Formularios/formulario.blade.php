<?php
if($bandera==1){
	$valorc=null;
	$valorm=null;
}else{ 
	$valorc = $bancomobiliarios->mobiliario_id;
	$valorm = $bancomobiliarios->banco_id;
}
 ?>
<div >
 	<div>
		
		{!!Form::label('lbanco','Banco:')!!}
		<select name="banco_id">
			@foreach($c as $bancos)
				@if($valorm==$bancos->id && $valorm!=null)
					<option value="{{$bancos->id}}" selected="selected">{{$bancos->nombre}}</option>
				@else
					<option value="{{$bancos->id}}">{{$bancos->nombre}}</option>
				@endif
			@endforeach
		</select>
		
 	</div>
	<div>
		{!!Form::label('lmobiliario','Mobiliario:')!!}
		<select name="mobiliario_id">
			@foreach($m as $mobiliario)
				@if($valorc==$mobiliario->id && $valorc!=null)
					<option value="{{$mobiliario->id}}" selected="selected">{{$mobiliario->nombre}}</option>
				@else
					<option value="{{$mobiliario->id}}">{{$mobiliario->nombre}}</option>
				@endif
			@endforeach
		</select>
		
	</div>
	{!!Form::label('lcantidad','Monto $ :')!!}
	{!!Form::text('cantidad',null,['placeholder'=>'Monto a cancelar'])!!}
	{!!Form::label('lcheque','Número de Cheque:')!!}
	{!!Form::text('cheque',null,['placeholder'=>'número de Cheque'])!!}
	{!!Form::label('ldetalle','Detalle:')!!}
	{!!Form::textarea('detalle',null,['placeholder'=>'Describa el detalle de esta salida'])!!}
 </div>