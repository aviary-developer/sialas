@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/tipos') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/tipos/'.$c->id.'/edit') !!}>
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
    <h2>Tipos de Depresiacion</h2>
    <h3 id="txt"> |{{$c->nombre}}</h3>
  </div>
  <div class="datos">
    
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$c->id !!}</span></pre>
    <pre>Codigo:&#09;&#09;&#09;&#09;&#09;<span>{{$c->codigo}}</span></pre>
    <pre>Nombre:&#09;&#09;&#09;&#09;&#09;<span>{{ $c->nombre }}</span></pre>
    <pre>Tipo de Depresiacion:<span>

           @if($c->descripcion==0)<?php echo 'Edificaciones' ?>@endif
          @if($c->descripcion==1)<?php echo 'Maquinaria'?>@endif
          @if($c->descripcion==2)<?php echo 'Vehiculo'?>@endif
          @if($c->descripcion==3)<?php echo 'Otros bienes muebles'?>@endif

  </span></pre>
    
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$c->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$c->updated_at->format('d-m-Y g:i:s a')}} </span></pre>

  </div>
</div>
@stop