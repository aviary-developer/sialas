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
    <h2>Detalles de Usuarios</h2>
  </div>
  <center>
	<table clas="none">
    @foreach($user as $u)
		<tr>
      <td>
        Identificador:
      </td>
      <td>
        {{$u->id}}
      </td>
		</tr>
    <tr>
      <td>
        Nombre:
      </td>
      <td>
        {{$u->nombre}}
      </td>
		</tr>
    <tr>
      <td>
        Nombre de usuario:
      </td>
      <td>
        {{$u->nom_usuario}}
      </td>
		</tr>
    <tr>
      <td>
        Dirección:
      </td>
      <td>
        {{$u->direccion}}
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
