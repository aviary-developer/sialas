@extends('welcome')
@section('layout')

  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href="servicios/create">
        <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext" id="tt">Nuevo</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/servicios?nombre='.$name.'&estado='.$cam) !!}>
        @if(!$cam)
          <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
        @else
          <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
        @endif
      </a>
      @if(!$cam)
        <span class="tooltiptext" id="tt">Papelera</span>
      @else
        <span class="tooltiptext" id="tt">Activos</span>
      @endif
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext" id="tt">Reporte</span>
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/ayu.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Ayuda</span>
    </div>
  </div>
@stop
