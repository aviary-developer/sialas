@extends('welcome')
@section('layout')
	<div class="panel">
		<div class="enc">
			<h2>Servicios</h2>
		</div>
	{!!Form::model($servicio,['route'=>['servicios.update',$servicio->id],'method'=>'PUT'])!!}

		@include('servicios.formularios.formulario')

	{!!Form::submit('Guardar')!!}

	{!!Form::close()!!}
	</div>

@stop
