@extends('welcome')
@section('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/users') !!}>
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/ayu.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Ayuda</span>
    </div>
  </div>
  <div class="panel">
    <div class="enc">
      <h2>Usuarios</h2>
      <h3 id="txt">|Editar</h3>
    </div>
    {!! Form::model($usuario,['route'=>['users.update',$usuario->id],'method'=>'PUT']) !!}
    @include('User.Formularios.Formulario')
    {!! Form::submit('Actualizar') !!}
    {!!Form::close()!!}
  </div>
@stop