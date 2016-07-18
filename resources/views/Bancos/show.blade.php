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
          <span>Código</span>
          <span>{!! $banco->id!!}</span>
        </div>
        <div class="srow">
          <span>Nombre</span>
          <span>{!! $banco->nombre !!}</span>
        </div>
        <div class="srow">
          <span>Cuenta Bancaria</span>
          <span>{!! $banco->numero !!}</span>
        </div>
        <div class="srow">
          <span>Nombre del Representante</span>
          <span>{!! $banco->representante !!}</span>
        </div>

      </div>
      <!---->
      <!----->
        <div class="tabs oc" id="dos">
          <div class="enc">
            <h3 id="txt">Estado</h3>
          </div>
          <div class="srow">
            @if($banco->estado == 1)
              <?php $var = 'Activo'?>
            @else
              <?php $var = 'En papelera'?>
            @endif
            <span>Estado</span>
            <span>{!! $var !!}</span>
          </div>

          <div class="srow">
            <span>Fecha de creación</span>
            <span>{!! $banco->created_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de última edición</span>
            <span>{!! $banco->updated_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
        </div>
      </div>
    </center>
</div>
@stop
