<?php
if($bandera==1){
	$v=null;
	$t=null;
	$valorp=null;
	$b=1;
}else{

	$valorp=$reparaciones->proveedor_id;
	$b=0;
}
?>

<div class="fila">
	<div class="">
		<div id='rbtnCredito' class="radiosg">
			{!!Form::label('lcredito','Reparacion al Credito:')!!}<br>
			<div class="fila">
				<div>
					{!!Form :: radio ( "credito", 1,true,['onclick'=>'vercredito()','id'=>'cred1'])!!}
					<label for="cred1"><span></span>Si</label>
				</div>
				<div>
					{!!Form :: radio ( "credito", 0,false,['onclick'=>'vercredito()','id'=>'cred0'])!!}
					<label for="cred0"><span></span>No</label>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="fila">
	<div class="">
		<div class=""></div>
		<div id="proveedor">
			{!!Form::label('lproveedor','Proveedor:')!!}
			<select name="proveedor_id">
				@foreach($p as $prov)
					@if($valorp==$prov->id && $valorp!=null)
						<option value="{{$prov->id}}" selected="selected">{{$prov->nombre}}</option>
					@else
						<option value="{{$prov->id}}">{{$prov->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="">
		{!!Form::label('lfechadeposito','Fecha de Deposito:')!!}
		{!!Form::date('fecha_deposito',null,['placeholder'=>'Ingrese fecha'])!!}
	</div>
</div>

<div class="fila">
	<div class="fila">
		<div class="">
			{!!Form::label('lprecio','Precio ($):')!!}
			{!!Form::number('precio',null,['placeholder'=>'$00.00','min'=>'0','step'=>'0.01'])!!}
		</div>
		<div class="">
			{!!Form::label('liva','IVA ($):')!!}
			{!!Form::number('iva',null,['placeholder'=>'$00.00','min'=>'0','step'=>'0.01','onfocus'=>'ivalue("precio","iva")'])!!}
		</div>
	</div>
	<div class="credit">
		<div class="fila">
			<div>
				{!!Form::label('Linteres','Interés (%):')!!}
				{!!Form::number('interes',null,['placeholder'=>'Ingrese interés','min'=>'0','step'=>'0.01'])!!}
			</div>
			<div>
				{!!Form::label('Lnumcuotas','Número de Cuotas:')!!}
				{!!Form::number('num_cuotas',null,['placeholder'=>'Número de cuotas','min'=>'0','step'=>'1'])!!}
			</div>
		</div>
	</div>
</div>
<div class="fila">
	<div class="credit">
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
		<div class="fila">
			<div class="credit">
				{!!Form::label('Lvalcuotas','Valor de Cuota ($):')!!}
				{!!Form::number('val_cuotas',null,['placeholder'=>'Valor de la cuota','min'=>'1','step'=>'0.01'])!!}
			</div>
			<div class="credit">
				{!!Form::label('cuenta','Número de Cuenta:')!!}
				{!!Form::number('cuenta',null,['placeholder'=>'Número de cuenta','min'=>'1','step'=>'1'])!!}
			</div>
		</div>
</div>
<div class="fila">
	<div class="delta">
		{!!Form::label('ldiagnostico','Diagnostico:')!!}
		{!!Form::textarea('diagnostico',null,['placeholder'=>'Descripción del problema:','rows'=>'4'])!!}
	</div>
</div>
