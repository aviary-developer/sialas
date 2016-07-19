@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/servicios') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/servicios/'.$s->id.'/edit') !!}>
      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Editar</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/pagoservicios/crear/'.$s->id) !!}>
      <img src={!! asset('/img/WB/vend.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Pago</span>
  </div>
  @if($s->estado == 1)
    <div class="tooltip">
        @include('Servicios.Formularios.darDeBaja')
      <span class="tooltiptext">Papelera</span>
    </div>
  @else
    <div class="tooltip">
        @include('Servicios.Formularios.darDeAlta')
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
    <h2>Servicios</h2>
    <h2></h2>
    <h3 id="txt"> |{{$s->nombre}}</h3>
  </div>
  <center>
    <div class="tpcontenido">
      <ul class="supernav">
        <li id ="luno" class="activ" onclick="cambio('uno','luno')">Datos</li>
        <li id="ldos" onclick="cambio('dos','ldos')">Pagos</li>
        <li id="ltres" onclick="cambio('tres','ltres')">Estado</li>

      </ul>
      <div class="tabs ve" id="uno">
        <!---->
        <div class="enc">
          <h3 id="txt">Datos</h3>
        </div>
        <div class="srow">
          <span>Código</span>
          <span>{!! $s->id !!}</span>
        </div>
        <div class="srow">
          <span>Nombre</span>
          <span>{!! $s->nombre !!}</span>
        </div>
        <div class="srow">
          <span>Proveedor</span>
          <span>{!! $s->proveedor !!}</span>
        </div>
        <div class="srow">
          <span>Numero de Recibo</span>
          <span>{!! $s->n_recibo !!}</span>
        </div>
      </div>


      <!----->
      <div class="tabs oc" id="dos">
        <div class="enc">
          <h3 id="txt">Pagos</h3>
        </div>
          <br>
          <table>
            <tr>
              <th>#</th>

              <th>Pago</th>
              <th>monto</th>
              <th>Factura</th>

            </tr>
            <?php $a = 1; ?>
            @foreach($p as $k)
              <tr>
                <td><center>{{$a}}</center></td>
                @if($k->caja_id==null)
                <td><center>{{$k->nombreBanco($k->banco_id)}}</center></td>
                @else
                <td><center>{{$k->nombreCaja($k->caja_id)}}</center></td>
                @endif
                <td><center>{{'$ '.number_format($k->monto,2)}}</center></td>
                <td><center>{{$k->factura}}</center></td>

              </tr>
              <?php $a++; ?>
            @endforeach
          </table>

          <br>
      </div>



        <!---->
        <div class="tabs oc" id="tres">
          <div class="enc">
            <h3 id="txt">Estado</h3>
          </div>
          <div class="srow">
            @if($s->estado == 1)
              <?php $var = 'Activo'?>
            @else
              <?php $var = 'En papelera'?>
            @endif
            <span>Estado</span>
            <span>{!! $var !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de creación</span>
            <span>{!! $s->created_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
          <div class="srow">
            <span>Fecha de última edición</span>
            <span>{!! $s->updated_at->format('d-m-Y g:i:s a') !!}</span>
          </div>
        </div>
      </div>
    </center>
</div>
@stop
