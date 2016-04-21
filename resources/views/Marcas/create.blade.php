@extends('welcome')
@section('layout')
{!! Form::open(['route'=>'marcas.store','methoh'=>'POST'])!!}
@include('marcas.Formularios.formularios')
{!!Form::submit('Guardar')!!}
{!!Form::close()!!}
@stop
