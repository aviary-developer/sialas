<?php
if($bandera==1){
	$valorc=null;
	$valorm=null;
}else{ 
	$valorc = $cajamobiliarios->mobiliario_id;
	$valorm = $cajamobiliarios->caja_id;
}
 ?>
<div >
	{!!Form::label('llabel','Como Realizara el Pago:')!!}<br>
	<div class="fila">
		{!!Form :: radio ( "vradio", "Efectivo",true,['onclick'=>'ver'])!!}Efectivo
		{!!Form :: radio ( "vradio", "Cheque",false,['onclick'=>'ver'])!!}Cheque
	</div>
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
		{!!Form::label('lmobiliario','Mobiliario:')!!}
		<select name="mobiliario_id">
			@foreach($m as $mobiliarios)
				@if($valorc==$mobiliarios->id && $valorc!=null)
					<option value="{{$mobiliarios->id}}" selected="selected">{{$mobiliarios->nombre}}</option>
				@else
					<option value="{{$mobiliarios->id}}">{{$mobiliarios->nombre}}</option>
				@endif
			@endforeach
		</select>
		
	</div>
	{!!Form::label('lmonto','Monto $ :')!!}
	{!!Form::text('cantidad',null,['placeholder'=>'Monto a cancelar'])!!}
	{!!Form::label('ldetalle','Detalle:')!!}
	{!!Form::textarea('detalle',null,['placeholder'=>'Describa el detalle de esta salida'])!!}
 </div>