@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/marcas') !!}>
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Nuevo</span>
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
    <h2>Marcas</h2>
    <h3 id="txt"> |{{$c->nombre}}</h3>
  </div>
  <div class="datos">
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$c->id !!}</span></pre>
    <pre>Nombre:&#09;&#09;&#09;&#09;&#09;<span>{{ $c->nombre }}</span></pre>
    @if($c->estado == 1)
      <?php $var = 'Activo'?>
    @else
      <?php $var = 'En papelera'?>
    @endif
    <pre>Estado:&#09;&#09;&#09;&#09;&#09;<span>{{$var}}</span></pre>
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$c->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$c->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
  </div>
</div>
@stop