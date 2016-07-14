<?php $bandera=1; ?>

  @if($m->num_cuotas==$f || $m->monto <= $p)
    <?php $se_pago = true; ?>
  @else
    <?php $se_pago = false; ?>
  @endif
@extends('welcome')
@section('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('prestamos/'.$m->mobiliario_id) !!}>
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
      <h2>Pago de Prestamos</h2>
      <h3 id="txt">|{{ $m->banconombre }}</h3>
    </div>
{!! Form::open(['url'=>['guardarPagosprestamos',$prestamo],'method'=>'POST']) !!}
@include('pagosprestamos.Formularios.formulario')
{!! Form::submit('Guardar') !!}
{!!Form::close()!!}
</div>
@stop
