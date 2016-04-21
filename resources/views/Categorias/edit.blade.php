@extends('welcome')
@section('layout')
  {!! Form::model($categoria,['route'=>['categorias.update',$categoria->id],'method'=>'PUT']) !!}
  @include('Categorias.Formularios.formulario')
  {!! Form::submit('Actualizar') !!}
  {!!Form::close()!!}
@stop
