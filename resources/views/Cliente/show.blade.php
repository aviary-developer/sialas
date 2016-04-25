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
    <h2>Detalles de cliente</h2>
  </div>
  <center>
	<table clas="none">
    @foreach($clientes as $cliente)
		<tr>
      <td>Identificador:
      </td>
      <td>{{$cliente->id}}
      </td>
		</tr>
    <tr>
      <td>Nombre:
      </td>
      <td>{{$cliente->nombre}}
      </td>
		</tr>
    <tr>
      <td>Apellido:
      </td>
      <td>{{$cliente->apellido}}
      </td>
		</tr>
    <tr>
      <td>Dui:
      </td>
      <td>{{$cliente->dui}}
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
