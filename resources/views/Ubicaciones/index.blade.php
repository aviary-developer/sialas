@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
@if($state == 1 || $state == null)
  <?php $cam = 0; ?>
@else
  <?php $cam = 1; ?>
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
    <a href={!! asset('/ubicaciones/create') !!}>
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/ubicaciones?nombre='.$name.'&estado='.$cam) !!}>
      @if(!$cam)
        <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
      @else
        <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
      @endif
    </a>
    @if(!$cam)
      <span class="tooltiptext" id="tt">Papelera</span>
    @else
      <span class="tooltiptext" id="tt">Activos</span>
    @endif
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
    <h2>Ubicaciones</h2>
    @if(!$cam)
      <h3 id='txt'> |Activos</h3>
    @else
      <h3 id='txt'> |Papelera</h3>
    @endif
    <div class="sep"></div>
    {!!Form::open(['route'=>'ubicaciones.index','method'=>'GET','role'=>'search','class'=>'search'])!!}
    {!! Form::text('nombre',null,['placeholder'=>'Nombre de ubicacion']) !!}
    {!! Form::submit('Buscar') !!}
    {!! Form::close() !!}
  </div>
  <center>
	<table>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Acciones</th>
		</tr>
	<?php $a=1; ?>
	@foreach($cajasActivas as $ubicacion)
	<tr>
	<td>{{$a}}</td>
	<td>{{$ubicacion->nombre}}</td>
  <td>
    <div class="up">
      <img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
      <div class="image">
        <div class="tooltip">
          <a href={!! asset('/ubicaciones/'.$ubicacion->id.'/edit') !!}>
            <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
          </a>
          <span class="tooltiptextup">Editar</span>
        </div>
        @if(!$cam)
        <div class="tooltip">
            @include('Ubicaciones.Formularios.darDeBaja')
          <span class="tooltiptextup">Papelera</span>
        </div>
        @else
          <div class="tooltip">
              @include('Ubicaciones.Formularios.darDeAlta')
            <span class="tooltiptextup">Activar</span>
          </div>
        @endif
        <div class="tooltip">
          <a href={!! asset("/ubicaciones/".$ubicacion->id) !!}>
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
    {!! str_replace ('/?', '?', $cajasActivas->appends(Request::only(['nombre','estado']))->render ()) !!}
  </div>
</center>
</div>
@stop
