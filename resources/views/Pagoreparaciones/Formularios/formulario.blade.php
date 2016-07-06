<?php
if($bandera==1){
	$valorc=null;
	$valorm=null;
	$valorb=null;
}else{
	$valorc = $pagoreparaciones->reparacion_id;
	$valorm = $pagoreparaciones->caja_id;
	$valorb = $pagoreparaciones->banco_id;
}
?>
@if($se_pago)
	<p>
		Ya se pago todo el valor del bien
	</p>
@else
	@if($m->credito)
		Cuotas: <b>{{$f}}</b>/{{$m->num_cuotas}}    |    Capital: <b>{{'$ '.number_format($p,2)}}</b>/{{'$ '.number_format($m->precio,2)}} |    Monto de cuota: {{'$ '.number_format($m->val_cuotas,2)}}
	@else
		Capital: <b>{{'$ '.number_format($p,2)}}</b>/{{'$ '.number_format(($m->precio + $m->iva),2)}}
	@endif
	<div class = "radiosg">
		{!!Form::label('llabel','Forma de pago:')!!}<br>
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
					@foreach($b as $banco)
						@if($valorb==$banco->id && $valorb!=null)
							<option value="{{$banco->id}}" selected="selected">{{$bancos->nombre}}</option>
						@else
							<option value="{{$banco->id}}">{{$banco->nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div id='cheque' style='display:none'>
				{!!Form::label('lcheque','Número de Cheque:')!!}
				{!!Form::text('cheque',null,['placeholder'=>'Numero de cheque'])!!}
			</div>
			{!!Form::label('lmonto','Monto ($):')!!}
			{!!Form::text('monto',null,['placeholder'=>'00.00'])!!}
			@if($m->credito == 1)
				<div class="fila">
					<div class="">
						{!!Form::label('linteres','Interes ($):')!!}
						{!!Form::number('interes',null,['placeholder'=>'00.00'])!!}
					</div>
					<div class="">
						{!!Form::label('lmora','Mora ($):')!!}
						{!!Form::number('mora',null,['placeholder'=>'00.00'])!!}
					</div>
				</div>
			@endif
		</div>
		<div>
			{!!Form::label('lfactura','Número de factura:')!!}
			{!!Form::text('factura',null,['placeholder'=>'Número de factura o ticket de pago'])!!}
			{!!Form::label('ldetalle','Detalle:')!!}
			{!!Form::textarea('detalle',null,['placeholder'=>'Describa el detalle de esta salida','rows'=>'4'])!!}
		</div>
	</div>
@endif
