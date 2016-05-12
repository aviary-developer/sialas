@extends('welcome')
@section('layout')
	<div class="launcher">
	    <div class="lfloat"></div>
	    <div class="tooltip">
	      <a href={!! asset('/servicios') !!}>
	        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
	      </a>
	      <span class="tooltiptext">Atras</span>
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
			<h3 id='txt'> |Editar</h3>
		</div>
		@include('verErrores')
	{!!Form::model($servicio,['route'=>['servicios.update',$servicio->id],'method'=>'PUT'])!!}

		@include('servicios.formularios.formulario')

	{!!Form::submit('Guardar')!!}

	{!!Form::close()!!}
	</div>

@stop
