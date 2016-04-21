@extends('welcome')
@section('layout')
<div>
	<strong>Registrar servicio</strong>
	{!!Form::open(['route'=>'servicios.store','method'=>'POST'])!!}

		@include('servicios.formularios.formulario')

	{!!Form::submit('Guardar')!!}

	{!!Form::close()!!}

</div>

@stop