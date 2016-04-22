@extends('welcome')
@section('layout')
<div>
	<strong>Servicios Activos</strong>

	<table>
		<tr>
			<th>N°</th>
			<th>Servicio</th>
			<th>Proveedor</th>
			<th>N° de recibo</th>
			<th colspan="2">Opciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($activos as $activo)
		<tr>
			<td>{{$a}}</td>
			<td>{{$activo->nombre}}</td>
			<td>{{$activo->proveedor}}</td>
			<td>{{$activo->n_recibo}}</td>
			<td>{!!link_to_route('servicios.edit', $title = 'Editar', $parameters = $activo->id)!!}</td>
			<td>Dar de baja</td>
		</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>
</div>

<div>
	<strong>Servicios Inactivos</strong>

	<table>
		<tr>
			<th>N°</th>
			<th>Servicio</th>
			<th>Proveedor</th>
			<th>N° de recibo</th>
			<th>Opciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($inactivos as $servicio)
		<tr>
			<td>{{$a}}</td>
			<td>{{$servicio->nombre}}</td>
			<td>{{$servicio->proveedor}}</td>
			<td>{{$servicio->n_recibo}}</td>
			<td>Dar de alta</td>
		</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>
</div>

@stop
