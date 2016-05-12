@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/bancos') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/bancos/'.$banco->id.'/edit') !!}>
      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Editar</span>
  </div>
  @if($banco->estado == 1)
    <div class="tooltip">
        @include('Bancos.Formularios.darDeBaja')
      <span class="tooltiptext">Papelera</span>
    </div>
  @else
    <div class="tooltip">
        @include('Bancos.Formularios.darDeAlta')
      <span class="tooltiptext">Activar</span>
    </div>
  @endif
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Reporte</span>
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
    <h2>Bancos</h2>
    <h3 id="txt"> |{{$banco->nombre}}</h3>
  </div>
  <div class="datos">
    <pre>Identificador:&#09;&#09;&#09;&#09;&#09;&#09;<span>{!!$banco->id !!}</span></pre>
    <pre>Nombre de Banco:&#09;&#09;&#09;&#09;&#09;<span>{{ $banco->nombre }}</span></pre>
    <pre>Número de Cuenta Bancaria:&#09;&#09;&#09;<span>{{ $banco->numero}}</span></pre>
    <pre>Representante de Cuenta Bancaria:&#09;<span>{{ $banco->representante}}</span></pre>
    @if($banco->estado == 1)
      <?php $var = 'Activo'?>
    @else
      <?php $var = 'En papelera'?>
    @endif
    <pre>Estado:&#09;&#09;&#09;&#09;&#09;<span>{{$var}}</span></pre>
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$banco->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$banco->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
  </div>
</div>
@stop
