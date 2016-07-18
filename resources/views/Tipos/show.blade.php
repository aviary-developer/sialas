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
    <h2>Tipo de Depresiacion</h2>
    <h3 id="txt"> |{{$c->nombre}}</h3>
  </div>
  <center>
    <div class="tpcontenido">
      <ul class="supernav">
        <li id ="luno" class="activ" onclick="cambio('uno','luno')">Datos</li>
        <li id="ldos" onclick="cambio('dos','ldos')">Estado</li>
      </ul>

      <div class="tabs ve" id="uno">
        <!---->
        <div class="enc">
          <h3 id="txt">Datos</h3>
        </div>
        <div class="srow">
          <span>Identificacion</span>
          <span>{!! $c->id!!}</span>
        </div>
        <div class="srow">
          <span>Codigo</span>
          <span>{!! $c->codigo !!}</span>
        </div>
        <div class="srow">
          <span>Nombre</span>
          <span>{!! $c->nombre !!}</span>
        </div>
        <div class="srow">
          <span>Tipo de Depresiacion</span>
          @if($c->descripcion==0)<?php $var ='Edificaciones'; ?>@endif
         @if($c->descripcion==1)<?php $var = 'Maquinaria';?>@endif
         @if($c->descripcion==2)<?php $var = 'Vehiculo';?>@endif
         @if($c->descripcion==3)<?php $var = 'Otros bienes muebles';?>@endif
          <span>{!! $var !!}</span>
        </div>

      </div>
      <!---->
      <!----->
        <div class="tabs oc" id="dos">
          <div class="enc">
            <h3 id="txt">Estado</h3>
          </div>

          <div class="srow">
            <span>Fecha de creación</span>
            <span>{!! $c->created_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de última edición</span>
            <span>{!! $c->updated_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
        </div>
      </div>
    </center>
</div>
@stop
