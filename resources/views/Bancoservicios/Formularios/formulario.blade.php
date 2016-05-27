<?php
if($bandera==1){
	$valorb=null;
	$valors=null;
}else{
	$valorb=$bancoservicios->banco_id;
	$valors=$bancoservicios->servicio_id;
}
 ?>
 <div class="fila">
 	<div>
		<!--{!!Form::label('lnombre','Nombre:')!!}
		{!!Form::text('nombre',null,['placeholder'=>'Seleccione Banco'])!!}-->
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
		{!!Form::label('limagen','Imagen:')!!}
		{!!Form::file('nombre_img',['value'=>'Elija'])!!}
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
		{!!Form::text('cheque',null,['placeholder'=>'Ingrese Cheque'])!!}
	</div>
 </div>