@extends('welcome')
@section('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/general/ayu.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Ayuda</span>
    </div>
  </div>
  <div class="panel">
    <div class="enc">
      <h2>Cajas</h2>
    </div>
{!! Form::open(['route'=>'cajas.store','method'=>'POST'])!!}
@include('cajas.Formularios.formulario')
{!!Form::submit('Guardar')!!}
{!!Form::close()!!}
</div>
@stop
