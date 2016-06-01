<?php
if($bandera==1){
	$valorc=null;
	$valorm=null;
}else{
	$valorc = $cajamobiliarios->mobiliario_id;
	$valorm = $cajamobiliarios->caja_id;
}
 ?>
 <div>
	 {!!Form::label('llabel','Como Realizara el Pago:')!!}<br>
	 <div class="fila">
		 <div>
			 {!!Form :: radio ( "vradio", 1,true,['onclick'=>'ver()','id'=>'efe1'])!!}
			 <label for="efe1"><span></span>Efectivo</label>
		 </div>
		 <div>
			 {!!Form :: radio ( "vradio", 0,false,['onclick'=>'ver()','id'=>'efe0'])!!}
			 <label for="efe0"><span></span>Cheque</label>
		 </div>
	 </div>
 </div>
<div class = "fila">
	<div>
		<div></div>
		<div id="caja">
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
		<div id="banco" style='display:none'>
			{!!Form::label('lbanco','Banco:')!!}
			<select name="banco_id">
				@foreach($c as $banco)
					@if($valorm==$banco->id && $valorm!=null)
						<option value="{{$banco->id}}" selected="selected">{{$bancos->nombre}}</option>
					@else
						<option value="{{$banco->id}}">{{$banco->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
		{!!Form::label('lmonto','Monto $ :')!!}
		{!!Form::text('cantidad',null,['placeholder'=>'Monto a cancelar'])!!}
		<div id='cheque' style='display:none'>
			{!!Form::label('lcheque','Número de Cheque:')!!}
			{!!Form::text('cheque',null,['placeholder'=>'Numero de cheque'])!!}
		</div>
	</div>
	<div>
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
		{!!Form::label('ldetalle','Detalle:')!!}
		{!!Form::textarea('detalle',null,['placeholder'=>'Describa el detalle de esta salida','rows'=>'4'])!!}
	</div>
 </div>
