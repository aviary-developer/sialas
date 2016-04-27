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
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href="servicios/create">
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext" id="tt">Nuevo</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Papelera</span>
  </div>
  <div class="tooltip">
    <a href="servicios/create">
      <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext" id="tt">Reporte</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/ayu.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Ayuda</span>
  </div>
</div>

<div class="panel">

	<div class="enc">
    <h2>Servicios</h2>
    <h3 id='txt'> |Activos</h3>
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

			<th>Acciones</th>
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
