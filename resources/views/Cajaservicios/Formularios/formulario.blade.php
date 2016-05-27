<?php
if($bandera==1){
	$valorc=null;
	$valorm=null;
}else{ 
	$valorc = $cajaservicios->servicio_id;
	$valorm = $cajaservicios->caja_id;
}
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
		{!!Form::label('lservicio','Servicio:')!!}
		<select name="servicio_id">
			@foreach($m as $servicio)
				@if($valorc==$servicio->id && $valorc!=null)
					<option value="{{$servicio->id}}" selected="selected">{{$servicio->nombre}}</option>
				@else
					<option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
				@endif
			@endforeach
		</select>
		
	</div>
	{!!Form::label('lmonto','Monto $ :')!!}
	{!!Form::text('monto',null,['placeholder'=>'Monto a cancelar'])!!}
	{!!Form::label('ldetalle','Detalle:')!!}
	{!!Form::text('detalle',null,['placeholder'=>'Describa el detalle de esta salida'])!!}
 </div>