@extends('welcome')
@section('layout')
{!! Form::model($cajas, ['route'=> ['cajas.update', $cajas->id],'method'=>'PUT']) !!}
@include('cajas.Formularios.formulario')
{!! Form:: submit('Actualizar') !!}
{!! Form::close() !!}
@stop
