<?php
if($bandera==1){
	$valorb=null;
	$valors=null;
}else{
	$valorb=$bancoservicios->banco_id;
	$valors=$bancoservicios->servicio_id;
}
 ?>
 {!!Form::label('llabel','Como Realizara el Pago:')!!}<br>
 		<div class="fila">
 			{!!Form :: radio ( "vradio", "Efectivo",false,['onclick'=>'ver'])!!}Efectivo
 			{!!Form :: radio ( "vradio", "Cheque",true,['onclick'=>'ver'])!!}Cheque
 		</div>
 <div class="fila">
 	<div>
 		
		{!!Form::label('lbanco','Seleccione Banco:')!!}
		<select name="banco_id">
			@foreach($b as $bancos)
				@if($valorb==$bancos->id && $valorb!=null)bancos
					<option value="{{$bancos->id}}" selected="selected">{{$bancos->nombre}}</option>
				@else
					<option value="{{$bancos->id}}">{{$bancos->nombre}}</option>
				@endif
			@endforeach
		</select>
		{!!Form::label('lmonto','Monto $ :')!!}
	{!!Form::text('cantidad',null,['placeholder'=>'Ingrese monto','focusable'])!!}
		{!!Form::label('ldetalle','Detalle:')!!}
		{!!Form::textarea('detalle',null,['placeholder'=>'Describa el detalle de esta salida','focusable'])!!}
 	</div>
	<div>
		
		{!!Form::label('lservicio','Seleccione Servicio:')!!}
		<select name="servicio_id">
			@foreach($s as $servi)
				@if($valors==$servi->id && $valors!=null)
					<option value="{{$servi->id}}" selected="selected">{{$servi->nombre}}</option>
				@else
					<option value="{{$servi->id}}">{{$servi->nombre}}</option>
				@endif
			@endforeach
		</select>
		{!!Form::label('lcheque','Número de cheque:')!!}
		{!!Form::text('cheque',null,['placeholder'=>'Ingrese serie de cheque','focusable'])!!}
	</div>
 </div>