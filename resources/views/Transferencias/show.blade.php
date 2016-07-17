@extends('welcome')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/transferencias') !!}>
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
      <h2>Transferencia</h2>
      <h3 id="txt"> |{{$c->fecha_transferencia->format('d-m-Y')}}</h3>
    </div>

    <!--Pane-->
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
            <span>{!! $c->id!!}</span>
          </div>
          <div class="srow">
            <span>fecha de transferencia</span>
            <span>{!! $c->fecha_transferencia->format('d-m-Y') !!}</span>
          </div>
          <div class="srow">
            <span>Monto</span>
            <span>{!! '$'.number_format($c->monto,2) !!}</span>
          </div>
          <div class="srow">
            <span>Caja Emisora</span>
            <span>{!! $c->nombreCajas($c->cajita) !!}</span>
          </div>
          <div class="srow">
            <span>Caja Destino</span>
            <span>{!! $c->nombreCajas($c->caja_id) !!}</span>
          </div>
          <div class="srow">
            <span>Detalle</span>
            <span>{!! $c->detalle !!}</span>
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
