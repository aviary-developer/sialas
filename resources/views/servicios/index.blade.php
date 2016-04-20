@extends('welcome')
@section('layout')
<div>
	<strong>Servicios</strong>

	<table>
		<tr>
			<th>N°</th>
			<th>Servicio</th>
			<th>Proveedor</th>
			<th>N° de recibo</th>
		</tr>
	<?php 
	$a=1;
	 ?>
	@foreach($servicios as $servicio)
		<tr>
			<td>{{$a}}</td>
			<td>{{$servicio->nombre}}</td>
			<td>{{$servicio->proveedor}}</td>
			<td>{{$servicio->n_recibo}}</td>	
		</tr>
		<?php $a=$a+1; ?>
	@endforeach;
	</table>
</div>

@stop