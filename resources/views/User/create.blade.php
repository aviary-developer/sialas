@extends('welcome')
@section('layout')

	{!!Form::open(['route'=>'users.store','method'=>'POST'])!!}

@include('user.formularios.formulario')
{!!Form::submit('Guardar')!!}
{!!Form::close()!!}
@stop