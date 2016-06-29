<?php $bandera=1; ?>
@if($m->credito == 1)
  @if($m->num_cuotas==$f || $m->precio <= $p)
    <?php $se_pago = true; ?>
  @else
    <?php $se_pago = false; ?>
  @endif
@else
  @if($f==1)
    <?php $se_pago = true; ?>
  @else
    <?php $se_pago = false; ?>
  @endif
@endif
@extends('welcome')
@section('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/mobiliarios/'.$mobiliario) !!}>
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
      <h2>Pago de mobiliario</h2>
      <h3 id="txt">|{{ $m->nombre }}</h3>
    </div>
{!! Form::open(['url'=>['guardarPagos',$mobiliario],'method'=>'POST']) !!}
@include('pagos.Formularios.formulario')
{!!Form::close()!!}
</div>
@stop
