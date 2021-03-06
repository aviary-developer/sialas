<?php $bandera=1; ?>

@extends('welcome')
@section('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href="#">
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
      <h2>Reparaciones de Mobiliario</h2>
      <h3 id="txt"></h3>
    </div>
{!! Form::open(['url'=>['guardarReparaciones',$mobiliario],'method'=>'POST']) !!}
@include('Reparaciones.Formularios.formulario')
{!! Form::submit('Guardar') !!}
{!!Form::close()!!}
</div>
@stop
