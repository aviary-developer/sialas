@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div>
	<strong>Cajas Activas</strong>

	<table border="1">
		<tr>
			<th>N°</th>
			<th>Nombre</th>
			<th>Ubicación</th>
			<th colspan="2">Opciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($cajasActivas as $caja)
	<tr>
	<td>{{$a}}</td>
	<td>{{$caja->nombre}}</td>
	<td>{{$caja->ubicacion}}</td>
	<td>{!! link_to_route("cajas.edit", $title = "Editar", $parameters=$caja->id, $attributes=[]) !!}
	</td>
	<td>@include('Cajas.Formularios.darDeBaja')</td>
	</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>
</div>

<div>
	<strong>Cajas Inactivas</strong>

	<table border="1">
		<tr>
			<th>N°</th>
			<th>Nombre</th>
			<th>Ubicación</th>
			<th colspan="2">Opciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($cajasInactivas as $caja)
	<tr>
	<td>{{$a}}</td>
	<td>{{$caja->nombre}}</td>
	<td>{{$caja->ubicacion}}</td>da
	<td>@include('Cajas.Formularios.darDeAlta')</td>
	</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>
</div>
@stop
