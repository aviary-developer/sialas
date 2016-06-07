<?php
if($bandera==1){
	$v=null;
	$t=null;
	$valorm=null;
	$valorc=null;
	$b=1;
}else{
	$v = $mobiliarios->estado;
	$t = $mobiliarios->tiempo_pago;
	$valorm=$mobiliarios->proveedor_id;
	$valorc=$mobiliarios->tipo_id;
	$b=0;
	
}
?>

<div class="fila">
	<div>
	
		{!!Form::label('Lcodigo','Código:')!!}
		{!!Form::text('codigo',null,['placeholder'=>'Ingrese código'])!!}
		{!!Form::label('LNombre','Nombre del Mobiliario:')!!}
		{!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre'])!!}
		{!!Form::label('lfecha','Fecha de Compra:')!!}
		{!!Form::date('fecha_compra',null,['placeholder'=>'Ingrese fecha'])!!}
		{!!Form::label('lprecio','Precio:')!!}
		{!!Form::text('precio',null,['placeholder'=>'$00.00'])!!}

		<div>
		{!!Form::label('lestado','Estado del Bien:')!!}
		<select name="estado">
				@if( $v==0 && $v!=null)
					<option value="1" selected="selected">En Uso</option>	
				@else
					<option value="1">En Uso</option>	
				@endif
		</select>
 	</div>

		
		
@if($b!=1)

	<div>
		{!!Form::label('lestado','Estado del Bien:')!!}
		<select name="estado">
				@if( $v==0 && $v!=null)
					<option value="0" selected="selected">Vendido</option>	
				@else
					<option value="0">Vendido</option>	
				@endif

				@if($v==1 && $v!=null)
				<option value="1" selected="selected">En uso</option>
				@else
				<option value="1">En uso</option>
				@endif

				@if($v==2 && $v!=null)
				<option value="2" selected="selected">Desechado</option>
				@else
				<option value="2">Desechado</option>
				@endif

				@if($v==3 && $v!=null)
				<option value="3" selected="selected">Reparación</option>
				@else
				<option value="3">Reparación</option>
				@endif

				@if($v==4 && $v!=null)
				<option value="4" selected="selected">Donado</option>
				@else
				<option value="4">Donado</option>
				@endif
		</select>
 	</div>
 	@endif

 	<div id="proveedor">
			{!!Form::label('lproveedor','Proveedor:')!!}
			<select name="proveedor_id">
				@foreach($m as $prov)
					@if($valorm==$prov->id && $valorm!=null)
						<option value="{{$prov->id}}" selected="selected">{{$prov->nombre}}</option>
					@else
						<option value="{{$prov->id}}">{{$prov->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div id="tipos">
			{!!Form::label('ltipo','Tipo de Mobiliario:')!!}
			<select name="tipo_id">
				@foreach($c as $tip)
					@if($valorc==$tip->id && $valorc!=null)
						<option value="{{$tip->id}}" selected="selected">{{$tip->nombre}}</option>
					@else
						<option value="{{$tip->id}}">{{$tip->nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	


	<div id='rbtnEstado'>
	 {!!Form::label('lnuevo','Estado de Compra:')!!}<br>
	 <div class="fila">
		 <div>
			 {!!Form :: radio ( "nuevo", 1,true,['onclick'=>'verEstado()','id'=>'est1'])!!}
			 <label for="est1"><span></span>Nuevo</label>
		 </div>
		 <div>
			 {!!Form :: radio ( "nuevo",0,false,['onclick'=>'verEstado()','id'=>'est0'])!!}
			 <label for="est0"><span></span>Usado</label>
		 </div>
	 </div>
	</div>

<div id='nuevo' style='display:none'>
		{!!Form::label('Lanios','Años de Servicio:')!!}
		{!!Form::text('anios',null,['placeholder'=>'Ingrese años'])!!}
	</div>
		
		
		{!!Form::label('ldescripcion','Descripcion de Bien:')!!}
		{!!Form::textarea('descripcion',null,['placeholder'=>'detalle del bien:'])!!}
	</div>
	<div>

		<div id='rbtnCredito'>
		 {!!Form::label('lcredito','Compra al Crédito:')!!}<br>
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
	
<div id='credit'>
	 	{!!Form::label('Linteres','Interes %:')!!}
		{!!Form::text('interes',null,['placeholder'=>'Ingrese interes'])!!}
		{!!Form::label('Lnumcuotas','Número de Cuotas:')!!}
		{!!Form::text('num_cuotas',null,['placeholder'=>'Ingrese número de cuotas'])!!}
		{!!Form::label('Lvalcuotas','Valor de Cuota $ :')!!}
		{!!Form::text('val_cuotas',null,['placeholder'=>'Ingrese valor de la cuota'])!!}
		<div>
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
		{!!Form::label('cuenta','Numero de cuenta:')!!}
		{!!Form::text('cuenta',null,['placeholder'=>'Ingrese numero de cuenta'])!!}


		{!!Form::label('ldiapago','Día de Pago: ')!!}
		{!!Form::text('dia_pago',null,['placeholder'=>'Ingrese numero de día'])!!}
	</div>

	</div>

</div>
