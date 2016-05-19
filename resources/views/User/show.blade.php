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
    <h2>Usuario</h2>
    <h3 id="txt"> |{{$user->nom_usuario}}</h3>
  </div>
  <div class="datos">
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$user->id !!}</span></pre>
    <pre>Nombre:&#09;&#09;&#09;&#09;&#09;<span>{{ $user->nom_usuario }}</span></pre>
    <pre>Correo:&#09;&#09;&#09;&#09;&#09;<span>{{ $user->email }}</span></pre>
    <pre>Nombre de usuario:&#09;&#09;&#09;<span>{{ $user->name }}</span></pre>
    <pre>Salario:&#09;&#09;&#09;&#09;&#09;<span>{{ $user->salario }}</span></pre>
    <pre>Fecha de nacimiento:&#09;&#09;<span>{{ $user->fecha_de_nacimiento }}</span></pre>
    <pre>Teléfono:&#09;&#09;&#09;&#09;&#09;<span>{{ $user->telefono }}</span></pre>
    <pre>Fecha de inicio:&#09;&#09;&#09;<span>{{ $user->fecha_inicio }}</span></pre>
    <pre>Dirección:&#09;&#09;&#09;&#09;<span>{{ $user->direccion }}</span></pre>
    @if($user->estado == 1)
      <?php $var = 'Activo'?>
    @else
      <?php $var = 'En papelera'?>
    @endif
    <pre>Estado:&#09;&#09;&#09;&#09;&#09;<span>{{$var}}</span></pre>
    @if($user->tipo == 1)
      <?php $tip = 'Administrador'?>
    @elseif($user->tipo == 2)
      <?php $tip = 'Gerente'?>
    @elseif($user->tipo == 3)
      <?php $tip = 'Vendedor'?>
    @else
      <?php $tip = 'Cajero'?>
    @endif

    <pre>Tipo de usuario:&#09;&#09;&#09;<span>{{ $tip }}</span></pre>
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$user->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$user->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
  </div>
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
</div>
@stop