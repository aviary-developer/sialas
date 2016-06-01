<?php
if($bandera==1){
	$v=null;
}else{
	$v = $tipos->descripcion;
	
}
?>
	{!!Form::label('Lcodigo','Código:')!!}
	{!!Form::text('codigo',null,['placeholder'=>'Escriba codigo de categoria:'])!!}

	{!!Form::label('LNombre','Nombre:')!!}
	{!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre:'])!!}

	
	<div>
		{!!Form::label('ldepresiacion','Tipo de Depresiacion:')!!}
		<select name="descripcion">
				@if( $v==0 && $v!=null)
					<option value="0" selected="selected">Edificaciones</option>	
				@else
					<option value="0">Edificaciones</option>	
				@endif

				@if($v==1 && $v!=null)
				<option value="1" selected="selected">Maquinaria</option>
				@else
				<option value="1">Maquinaria</option>
				@endif

				@if($v==2 && $v!=null)
				<option value="2" selected="selected">Vehiculos</option>
				@else
				<option value="2">Vehiculos</option>
				@endif

				@if($v==3 && $v!=null)
				<option value="3" selected="selected">Otros bienes muebles</option>
				@else
				<option value="3">Otros bienes muebles</option>
				@endif
		</select>


 	</div>

	