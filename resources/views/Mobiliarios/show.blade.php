@extends('welcome')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/mobiliarios') !!}>
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/mobiliarios/'.$mob->id.'/edit') !!}>
        <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Editar</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/pagos/crear/'.$mob->id) !!}>
        <img src={!! asset('/img/WB/vend.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Pago</span>
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
      <h2>Mobiliarios</h2>
      <h3 id="txt"> |{{$mob->nombre}}</h3>
    </div>

    <!--Pane-->
    <center>
      <div class="tpcontenido">
        <ul class="supernav">
          <li id ="luno" class="activ" onclick="cambio('uno','luno')">Datos</li>
          <li id="ldos" onclick="cambio('dos','ldos')">Compra</li>
          <li id="ltres" onclick="cambio('tres','ltres')">Pagos</li>
          <li id="lcuatro" onclick="cambio('cuatro','lcuatro')">Estado</li>
        </ul>
        <div class="tabs ve" id="uno">
          <!---->
          <?php
          $id = $mob->id;
          $xy = str_pad($id,10,"0",STR_PAD_LEFT);
          ?>
            <div class="enc">
              <h3 id="txt">Datos</h3>
            </div>
            <div class="srow">
              <span>Identificador</span>
              <span>{!! $xy !!}</span>
            </div>
            <div class="srow">
              <span>Código</span>
              <span>{!! $mob->codigoTipos($mob->tipo_id).'-'.$mob->codigo !!}</span>
            </div>
            <div class="srow">
              <span>Nombre</span>
              <span>{!! $mob->nombre !!}</span>
            </div>
            <div class="srow">
              <span>Tipo</span>
              <span>{!! $mob->nombreTipos($mob->tipo_id) !!}</span>
            </div>
            <div class="srow">
              <span>Descripción</span>
              <span>{!! $mob->descripcion !!}</span>
            </div>
        </div>
        <!---->
        <div class="tabs oc" id="dos">
          <div class="enc">
            <h3 id="txt">Compra</h3>
          </div>
          <div class="srow">
            <span>Proveedor</span>
            <span>{!! $mob->nombreProveedor($mob->proveedor_id) !!}</span>
          </div>
          <div class="srow">
            <span>Estado de compra</span>
            @if($mob->nuevo == 1)
              <?php $varx = 'Nuevo'?>
            @else
              <?php $varx = 'Usado'?>
            @endif
            <span>{!! $varx !!}</span>
          </div>
          @if($mob->nuevo == 0)
            <div class="srow">
              <span>Años de servicio</span>
              <span>{!! $mob->anios !!}</span>
            </div>
          @endif
          <div class="srow">
            <span>Valor</span>
            <span>{!! '$ '.number_format($mob->precio,2) !!}</span>
          </div>
          <div class="srow">
            <span>IVA</span>
            <span>{!! '$ '.number_format($mob->iva,2) !!}</span>
          </div>
          <div class="srow">
            <span>Tipo de compra</span>
            @if($mob->credito == 1)
              <?php $vary = 'Al crédito'?>
            @else
              <?php $vary = 'Al contado'?>
            @endif
            <span>{!! $vary !!}</span>
          </div>
          @if($mob->credito == 1)
            <div class="srow">
              <span>Número de cuenta</span>
              <span>{!! $mob->cuenta !!}</span>
            </div>
            <div class="srow">
              <span>Número de cuotas</span>
              <span>{!! $mob->num_cuotas !!}</span>
            </div>
            <div class="srow">
              <span>Valor de cuotas</span>
              <span>{!! '$ '.number_format($mob->val_cuotas,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés</span>
              <span>{!! number_format($mob->interes,2).' %' !!}</span>
            </div>
            <div class="srow">
              <span>Tiempo de pago</span>
              @if($mob->tiempo_pago == 0)
                <?php $varz = 'Semanal'?>
              @elseif($mob->tiempo_pago == 1)
                <?php $varz = 'Quincenal'?>
              @elseif($mob->tiempo_pago == 2)
                <?php $varz = 'Mensual'?>
              @else
                <?php $varz = 'Anual'?>
              @endif
              <span>{!! $varz !!}</span>
            </div>
            <div class="srow">
              <span>Fecha de compra</span>
              <span>{!! $mob->fecha_compra !!}</span>
            </div>
          @endif
        </div>
        <!----->
        <div class="tabs oc" id="tres">
          <div class="enc">
            <h3 id="txt">Pagos</h3>
          </div>
          <div class="srow">
            <span>Capital abonado</span>
            <span>{!! '$ '.number_format($montoTotal,2) !!}</span>
          </div>
          <div class="srow">
            <span>Interés abonado</span>
            <span>{!! '$ '.number_format($interTotal,2) !!}</span>
          </div>
          <div class="srow">
            <span>Interés moratorio abonado</span>
            <span>{!! '$ '.number_format($moraTotal,2) !!}</span>
          </div>
          <div class="srow">
            @if($mob->num_cuotas <= 0)
              <?php $nc = 1; ?>
            @else
              <?php $nc = $mob->num_cuotas; ?>
            @endif
            <span>Cuotas pagadas</span>
            <span>{!! $cuotas.' de '.$nc!!}</span>
          </div>
        </div>
        <!----->
        <div class="tabs oc" id="cuatro">
          <div class="enc">
            <h3 id="txt">Estado</h3>
          </div>
          <div class="srow">
            <span>Estado</span>
            @if($mob->estado == 0)
              <?php $var = 'Vendido'?>
            @elseif($mob->estado == 1)
              <?php $var = 'En Uso'?>
            @elseif($mob->estado == 2)
              <?php $var = 'Desechado'?>
            @elseif($mob->estado == 3)
              <?php $var = 'En reparación'?>
            @else
              <?php $var = 'Donado'?>
            @endif
            <span>{!! $var !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de creación</span>
            <span>{!! $mob->created_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de última edición</span>
            <span>{!! $mob->updated_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
        </div>
      </div>
    </center>
  </div>
@stop
