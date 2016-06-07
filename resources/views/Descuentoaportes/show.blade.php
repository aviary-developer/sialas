@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/descuentoaportes') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/descuentoaportes/'.$s->id.'/edit') !!}>
      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Editar</span>
  </div>
  @if($s->estado == 1)
    <div class="tooltip">
        @include('Descuentoaportes.Formularios.darDeBaja')
      <span class="tooltiptext">Papelera</span>
    </div>
  @else
    <div class="tooltip">
        @include('Descuentoaportes.Formularios.darDeAlta')
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
    <h2>Descuentos y aportaciones</h2>
    <h3 id="txt"> |{{$s->nombre}}</h3>
  </div>
  <div class="datos">
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$s->id !!}</span></pre>
    <pre>Nombre:&#09;&#09;&#09;&#09;&#09;<span>{{ $s->nombre }}</span></pre>
    <pre>Tipo:&#09;&#09;&#09;&#09;&#09;&#09;<span>{{ $s->tipo }}</span></pre>
    <pre>Valor:&#09;&#09;&#09;&#09;&#09;<span>{{ $s->valor."%" }}</span></pre>
    @if($s->techo==0)
      <pre>Techo:&#09;&#09;&#09;&#09;&#09;<span>No posee</span></pre>
    @else
      <pre>Techo:&#09;&#09;&#09;&#09;&#09;<span>{{ $s->techo }}</span></pre>
    @endif
    @if($s->estado == 1)
      <?php $var = 'Activo'?>
    @else
      <?php $var = 'En papelera'?>
    @endif
    <pre>Estado:&#09;&#09;&#09;&#09;&#09;<span>{{$var}}</span></pre>

  </div>
</div>
@stop
