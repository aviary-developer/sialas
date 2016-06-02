<?php
if($bandera==1){
	$valorc=null;
	$valorm=null;
  $valorb=null;
}else{
	$valorc = $pagos->mobiliario_id;
	$valorm = $pagos->caja_id;
  $valorb = $pagos->banco_id;
}
 ?>
<div class = "fila">
	<div>
    <div class="radiosg">
      {!!Form::label('llabel','Tipo de Pago:')!!}<br>
      <div class="fila">
        <div>
          {!!Form :: radio ( "cradio", 1,true,['onclick'=>'credit()','id'=>'cre0'])!!}
          <label for="cre0"><span></span>Contado</label>
        </div>
        <div>
          {!!Form :: radio ( "cradio", 0,false,['onclick'=>'credit()','id'=>'cre1'])!!}
          <label for="cre1"><span></span>Credito</label>
        </div>
      </div>
    </div>
		<div></div>
    {!!Form::label('lfactura','Número de factura:')!!}
		{!!Form::text('factura',null,['placeholder'=>'Número de factura o ticket de pago'])!!}
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
		{!!Form::label('lmonto','Monto ($):')!!}
		{!!Form::text('cantidad',null,['placeholder'=>'Monto a cancelar'])!!}
    {!!Form::label('liva','IVA ($):')!!}
		{!!Form::text('iva',null,['placeholder'=>'IVA cancelado'])!!}
    <div id='interes' style='display:none'>
      {!!Form::label('linteres','Interes ($):')!!}
      {!!Form::text('interes',null,['placeholder'=>'Interes cancelado'])!!}
    </div>
	</div>
	<div>
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
    <div id='cheque' style='display:none'>
      {!!Form::label('lcheque','Número de Cheque:')!!}
      {!!Form::text('cheque',null,['placeholder'=>'Numero de cheque'])!!}
    </div>
    <div id='mora' style='display:none'>
      {!!Form::label('lmora','Mora ($):')!!}
      {!!Form::text('mora',null,['placeholder'=>'Mora cancelada'])!!}
    </div>
    {!!Form::label('ldetalle','Detalle:')!!}
    {!!Form::textarea('detalle',null,['placeholder'=>'Describa el detalle de esta salida','rows'=>'4'])!!}
	</div>
 </div>
