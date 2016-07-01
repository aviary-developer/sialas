<?php
if($bandera==1){
	$v=null;
	$t=null;
	$valorb=null;
  $valorc=null;
	$b=1;
}else{

	$valorb=$prestamos->banco_id;
  $valorc=$prestamos->caja_id;
	$b=0;
}
?>


	<div class="fila">
		<div>
      {!!Form::label('lbanconombre','Nombre de la Institucion:')!!}
      {!!Form::text('banconombre',null,['placeholder'=>'Nombre Banco'])!!}
    </div>
    <div>
      {!!Form::label('lcuenta','Numero de Cuenta:')!!}
      {!!Form::text('cuenta',null,['placeholder'=>'0000-0000')!!}
    </div>
	</div>

	<div class="fila">
		<div class="fila">
			<div class="">
        {!!Form::label('lmonto','Monto del Prestamo:')!!}
        {!!Form::number('monto',null,['placeholder'=>'$00.00','min'=>'100','step'=>'0.01'])!!}
			</div>
			<div>
				{!!Form::label('Linteres','Interés (%):')!!}
				{!!Form::number('interes',null,['placeholder'=>'Ingrese interés','min'=>'0','step'=>'0.01'])!!}
			</div>
		</div>

			<div class="fila">
				<div>
					{!!Form::label('Lnumcuotas','Número de Cuotas:')!!}
					{!!Form::number('num_cuotas',null,['placeholder'=>'Número de cuotas','min'=>'0','step'=>'1'])!!}
				</div>
				<div>
					{!!Form::label('Lvalcuotas','Valor de Cuota ($):')!!}
					{!!Form::number('val_cuotas',null,['placeholder'=>'Valor de la cuota','min'=>'1','step'=>'0.01'])!!}
				</div>
			</div>
	</div>
  <div class="fillable">
		<div >
			{!!Form::label('ltiempo','Tiempo de Pago:')!!}
			<select name="tiempo_pago">
				@if( $t==0 && $t!=null)
					<option value="0" selected="selected">Semanal</option>
				@else
					<option value="0">Semanal</option>
				@endif

				@if($t==1 && $t!=null)
					<option value="1" selected="selected">Quincenal</option>
				@else
					<option value="1">Quincenal</option>
				@endif

				@if($t==2 && $t!=null)
					<option value="2" selected="selected">Mensual</option>
				@else
					<option value="2">Mensual</option>
				@endif

				@if($t==3 && $t!=null)
					<option value="3" selected="selected">Anual</option>
				@else
					<option value="3">Anual</option>
				@endif
			</select>
		</div>
			<div>
				{!!Form::label('ldiapago','Día de Pago: ')!!}
				{!!Form::number('dia_pago',null,['placeholder'=>'Día de compra','min'=>'1','step'=>'1'])!!}
			</div>
  </div>

  <div class = "radiosg">
  	{!!Form::label('llabel','Donde lo depositara:')!!}<br>
  	<div class="fila">
  		<div>
  			{!!Form :: radio ( "deposito", 1,true,['onclick'=>'verdeposito()','id'=>'efe1'])!!}
  			<label for="efe1"><span></span>Caja</label>
  		</div>
  		<div>
  			{!!Form :: radio ( "deposito", 0,false,['onclick'=>'verdeposito()','id'=>'efe0'])!!}
  			<label for="efe0"><span></span>Banco</label>
  		</div>
  	</div>
  </div>


<div class="fila">
  <div id="caja" style='display:none'>
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
</div>


<div class="fila">
	<div class="delta">
		{!!Form::label('lgarantia','Garantia:')!!}
		{!!Form::textarea('Garantia',null,['placeholder'=>'Descripción de la Garantia:','rows'=>'4'])!!}
	</div>
</div>
