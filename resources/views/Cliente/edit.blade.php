@extends('welcome')
@section('layout')
{!! Form::model($clientes, ['route'=> ['clientes.update', $clientes->id],'method'=>'PUT']) !!}
@include('cliente.formularios.formulario')
{!! Form:: submit('Actualizar') !!}
{!! Form::close() !!}
@stop