@extends('base')
@section('layout')
  <div class="panel">
  <div class="enc">
    <h2>Recuperar</h2>
    <h3 id="txt">|Contraseña</h3>
  </div>
    {!!Form::open(['url'=>'pass/correo','method'=>'POST'])!!}
      {!!Form::label('lcorreo','Correo:')!!}
      {!!Form::text('email',null,['placeholder'=>'Correo'])!!}
  {!!Form::submit('Enviar')!!}
  </div>
@stop
