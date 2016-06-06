<?php $bandera=0; ?>
@extends('welcome')
@section('layout')
<div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/descuentoaportes') !!}>
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
      <h2>Descuentos y aportaciones</h2>
      <h3 id='txt'> |Editar</h3>
    </div>
	{!!Form::model($valor,['route'=>['descuentoaportes.update',$valor->id],'method'=>'PUT'])!!}

		@include('descuentoaportes.formularios.formulario')

	{!!Form::submit('Guardar')!!}

	{!!Form::close()!!}
	 </div>

@stop
