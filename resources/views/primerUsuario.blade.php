<?php $a=1 ?>
@extends('base')
@section('layout')
  <div class="panel">
    <div class="enc">
      <h2>Usuarios</h2>
      <h3 id="txt">|Primer usuario</h3>
    </div>
    {!!Form::open(['route'=>'users.store','method'=>'POST'])!!}
    @include('User.Formularios.Formulario')
    {!!Form::submit('Guardar')!!}
    {!!Form::close()!!}
  </div>
@stop
