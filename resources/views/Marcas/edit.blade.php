@extends('welcome')
@section('layout')
  {!! Form::model($marcas,['route'=>['marcas.update',$marcas->id],'method'=>'PUT']) !!}
  @include('Marcas.Formularios.formularios')
  {!! Form::submit('Actualizar') !!}
  {!!Form::close()!!}
@stop