@extends('welcome')
@section('layout')
{!! Form::open(['route' => 'clientes.store', 'method'=>'POST']) !!}
@include('cliente.formularios.formulario')
{!! Form:: submit('Guardar') !!}
{!! Form::close() !!}
@stop