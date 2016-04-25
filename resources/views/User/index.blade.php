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
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Ayuda</span>
  </div>
</div>

<div class="panel">
	<div class="enc">
		<h2>Usuarios Registrados</h2>
	</div>
	<center>
		<table id="block">
			<tr>
				<th>
					Id
				</th>
				<th>
					Nombre
				</th>
				<th>
					Acciones
				</th>
			</tr>
			@foreach($user as $u)
			<tr>
				<td>
					{{$u->id}}
				</td>
				<td>
					{{$u->nombre}}
				</td>
				<td>
					{!! link_to_route('user.edit', $title= "Editar", $parameters= $u->id, $attributes=[]) !!}
				</td>
			</tr>
			@endforeach

		</table>
		<table id="none">
			<tr>
				<th>
					Id
				</th>
				<th>
					Nombre
				</th>
				<th>
					Acciones
				</th>
			</tr>
			@foreach($us as $u)
			<tr>
				<td>
					{{$u->id}}
				</td>
				<td>
					{{$u->nombre}}
				</td>
				<td>
					{!! link_to_route('user.edit', $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
				</td>
			</tr>
			@endforeach
		</table>
	</center>
</div>
@stop