@extends('welcome')
@section('layout')
<div>
	<strong>Registrar servicio</strong>
	{!!Form::model($servicio,['route'=>['servicios.update',$servicio->id],'method'=>'PUT'])!!}

		@include('servicios.formularios.formulario')

	{!!Form::submit('Guardar')!!}

	{!!Form::close()!!}

</div>

@stop