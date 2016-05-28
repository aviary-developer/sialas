@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/cajamobiliarios') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/cajamobiliarios/'.$c->id.'/edit') !!}>
      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Editar</span>
  </div>
  
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
    <h2>Pagos en Efectivos</h2>
    <h3 id="txt"> |{{$c->nombreMobiliarios($c->mobiliario_id)}}</h3>
  </div>
  <div class="datos">
    
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$c->id !!}</span></pre>
    <pre>Servicio:&#09;&#09;&#09;&#09;&#09;<span>{{$c->nombreMobiliarios($c->mobiliarios_id)}}</span></pre>
    <pre>Caja:&#09;&#09;&#09;&#09;&#09;<span>{{ $c->nombreCajas($c->caja_id) }}</span></pre>
    <pre>Monto $:&#09;&#09;&#09;&#09;&#09;<span>{{$c->cantidad}}</span></pre>
    
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$c->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$c->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Detalle:&#09;&#09;&#09;&#09;&#09;<span>{{$c->detalle}}</span></pre>
  </div>
</div>
@stop