@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Nuevo</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Ayuda</span>
  </div>
</div>
<div class="panel">
  <div class="enc">
    <h2>Cajas</h2>
  </div>
  <center>
	<table id="block">
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
	<table id="none">
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
	<td>{{$caja->ubicacion}}</td>
	<td>@include('Cajas.Formularios.darDeAlta')</td>
	</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>
</center>
</div>
@stop
