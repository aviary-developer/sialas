@extends('welcome')
@section('layout')
	{!!Form::model($servicio,['route'=>['servicios.update',$servicio->id],'method'=>'PUT'])!!}

		@include('servicios.formularios.formulario')

	{!!Form::submit('Guardar')!!}

	{!!Form::close()!!}

@stop