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
    <h2>Detalles de Caja</h2>
  </div>
  <center>
	<table clas="none">
    @foreach($cajas as $caja)
		<tr>
      <td>Identificador:
      </td>
      <td>{{$caja->id}}
      </td>
		</tr>
    <tr>
      <td>Nombre:
      </td>
      <td>{{$caja->nombre}}
      </td>
		</tr>
    <tr>
      <td>Ubicación:
      </td>
      <td>{{$caja->ubicacion}}
      </td>
		</tr>
    <tr>
      <td>Fecha de Creación:
      </td>
      <td>{{$caja->created_at->format('d-m-Y g:i:s a')}}
      </td>
    </tr>
  @endforeach
	</table>
  <div class="enc">
    <h2>Transacciones</h2>
  </div>
	<table>
		<tr>
			<th>N°</th>
			<th>Tipo</th>
			<th>Valor</th>
		</tr>
	</table>
</center>
</div>
@stop
