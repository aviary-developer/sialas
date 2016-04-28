@extends('welcome')
@section('layout')
  {!! Form::model($user,['route'=>['user.update',$user->id],'method'=>'PUT']) !!}
  @include('User.Formularios.formulario')
  {!! Form::submit('Actualizar') !!}
  {!!Form::close()!!}
@stop