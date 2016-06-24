@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón', 'success')<\script";?>
@endif

<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/mobiliarios') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/tipos/create') !!}>
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
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
    <h2>Tipos</h2>
    <div class="sep"></div>
    {!!Form::open(['route'=>'tipos.index','method'=>'GET','role'=>'search','class'=>'search'])!!}
    {!! Form::text('nombre',null,['placeholder'=>'Tipo de mobiliario']) !!}
    {!! Form::submit('Buscar') !!}
    {!! Form::close() !!}
  </div>
	<center>
		<table id="block">
			<tr>
				<th>#</th>
				<th>Código</th>
				<th>Nombre</th>
				<th>Tipo de Depreciacion</th>
        <th>Acciones</th>
			</tr>
			<?php $a=1; ?>
			@foreach($tipos as $tip)
			<tr>
				<td>{{$a}}</td>
				<td>{{$tip->codigo}}</td>
				<td>{{$tip->nombre}}</td>

        <center><td>
          @if($tip->descripcion==0)<?php echo 'Edificaciones' ?>@endif
          @if($tip->descripcion==1)<?php echo 'Maquinaria'?>@endif
          @if($tip->descripcion==2)<?php echo 'Vehiculo'?>@endif
          @if($tip->descripcion==3)<?php echo 'Otros bienes muebles'?>@endif

      </td></center>
				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">
							<div class="tooltip">
								<a href={!! asset('/tipos/'.$tip->id.'/edit') !!}>
									<img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Editar</span>
							</div>
							<div class="tooltip">
								<a href={!! asset("/tipos/".$tip->id) !!}>
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
		     <div id="act">
        {!! str_replace ('/?', '?', $tipos) !!}
      </div>
	</center>
</div>
@stop
