@extends('welcome')
@section('layout')
{!! Form::open(['route'=>'cajas.store','methoh'=>'POST'])!!}
@include('cajas.Formularios.formulario')
{!!Form::submit('Guardar')!!}
{!!Form::close()!!}
@stop