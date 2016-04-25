@extends('welcome')
@section('layout')

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
      <img id= "im" src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Inactivos</span>
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
    <h2>Categorias</h2>
  </div>
  <center>
<table id="block">
		<tr>
			<th>N°</th>
			<th>N° de recibo</th>
			<th>Servicio</th>
			<th>Proveedor</th>
			<th colspan="2">Acciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($activos as $activo)
		<tr>
			<td>{{$a}}</td>
			<td>{{$activo->n_recibo}}</td>
			<td>{{$activo->nombre}}</td>
			<td>{{$activo->proveedor}}</td>
			<td>{!!link_to_route('servicios.edit', $title = 'Editar', $parameters = $activo->id)!!}</td>
			<td>@include('servicios.formularios.darDeBaja')</td>
		</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>

	<table id="none">
		<tr>
			<th>N°</th>
			<th>N° de recibo</th>
			<th>Servicio</th>
			<th>Proveedor</th>
			
			<th>Opciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($inactivos as $servicio)
		<tr>
			<td>{{$a}}</td>
			<td>{{$servicio->n_recibo}}</td>
			<td>{{$servicio->nombre}}</td>
			<td>{{$servicio->proveedor}}</td>
			<td>@include('servicios.formularios.darDeAlta')</td>
		</tr>
		<?php $a=$a+1; ?>
	@endforeach
	</table>
</center>
</div>
@stop
