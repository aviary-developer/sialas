@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón', 'success')<\script";?>
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
    <a href={!! asset('/user/create') !!} >
      <img id= "im" src={!! asset('/img/WB/general/nue.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Nuevo</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ" onclick="activo('block', 'none', 'tt', 'im')"/>
    </a>
    <span class="tooltiptext" id="tt">Papelera</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Reporte</span>
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
		<h2>Usuarios</h2>
		<h3 id='txt'> |Activos</h3>
	</div>
	<center>
		<table id="block">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Nombre de usuario</th>
				<th>Dirección</th>
				<th>Acciones</th>
			</tr>
			<?php $a=1; ?>
			@foreach($usuarioAc as $usac)
			<tr>
				<td>{{$a}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->nom_usuario}}</td>
				<td>{{$user->direccion}}</td>
				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">
							<div class="tooltip">
								<a href={!! asset('/user/'.$user->id.'/edit') !!}>
									<img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Editar</span>
							</div>
							<div class="tooltip">
								@include('User.Formularios.darDeBaja')
								<span class="tooltiptextup">Papelera</span>
							</div>
							<div class="tooltip">
								<a href={!! asset("/user/".$user->id) !!}>
									<img src={!! asset('/img/WB/ver.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Ver</span>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php $a=$a+1; ?>
			@endforeach
		</table>
		<table id="none">
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Nombre usuario</th>
				<th>Dirección</th>
				<th>Acciones</th>
			</tr>
			<?php $a=$a+1; ?>
			@foreach(usuarioInac as $usinac)
			<tr>
				<td>{{$a}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->nom_usuario}}</td>
				<td>{{$user->direccion}}</td>
				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">
							<div class="tooltip">
								<a href={!! asset('/user/'.$user->id.'/edit') !!}>
									<img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Editar</span>
							</div>
							<div class="tooltip">
								@include('User.Formularios.darDeAlta')
								<span class="tooltiptextup">Activar</span>
							</div>
							<div class="tooltip">
								<a href={!! asset("/user/".$user->id) !!}>
									<img src={!! asset('/img/WB/ver.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Ver</span>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php $a=$a+1; ?>
			@endforeach
		</table>
		{!! str_replace ('/?','?', $usuarioAc->render()) !!}
		{!! str_replace ('/?','?', $usuarioInac->render()) !!}
	</center>
</div>
@stop