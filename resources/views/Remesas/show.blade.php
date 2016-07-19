@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/remesas') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
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
    <h2>Remesas</h2>
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
          <span>{!! $r->id!!}</span>
        </div>
        <div class="srow">
          <span>Transaccion</span>
          @if($r->transaccion==0)<?php $var ='Retiro'; ?>@endif
         @if($r->transaccion==1)<?php $var = 'Remesa';?>@endif
           <span>{!! $var !!}</span>
        </div>
        <div class="srow">
          <span>Monto</span>
          <span>{!! '$ '.number_format($r->monto,2) !!}</span>
        </div>
        <div class="srow">
          <span>Caja</span>
          <span>{!! $r->nombreCajas($r->caja_id) !!}</span>
        </div>
        <div class="srow">
          <span>Banco</span>
          <span>{!! $r->nombreBancos($r->banco_id) !!}</span>
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
            <span>{!! $r->created_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de última edición</span>
            <span>{!! $r->updated_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
        </div>
      </div>
    </center>
</div>
@stop
