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
			<th>Estado</th>
			<th>Opciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($servicios as $servicio)
		<tr>
			<td>{{$a}}</td>
			<td>{{$servicio->nombre}}</td>
			<td>{{$servicio->proveedor}}</td>
			<td>{{$servicio->n_recibo}}</td>
			@if($servicio->estado==1)
			<td>Activo</td>
			@else
			<td>Inactivo</td>
			@endif	
			<td>{!!link_to_route('servicios.edit', $title = 'Editar', $parameters = $servicio->id)!!}</td>
		</tr>
		<?php $a=$a+1; ?>
	@endforeach;
	</table>
</div>

@stop