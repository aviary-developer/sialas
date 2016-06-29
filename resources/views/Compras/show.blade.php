@extends('welcome')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/compras') !!}>
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
      <h2>Detalle de Pedido</h2>
    </div>
    <center>
      <div class="tpcontenido">
        <ul class="supernav">
          <li id ="luno" class="activ" onclick="cambio('uno','luno')">Datos</li>
          <li id="ldos" onclick="cambio('dos','ldos')">Estado</li>
        </ul>
        <?php
        $id = $c->id;
        $xy = str_pad($id,10,"0",STR_PAD_LEFT);
        ?>
        <div class="tabs ve" id="uno">
          <div class="enc">
            <h3 id="txt">Datos</h3>
          </div>
          <div class="srow">
            <span>Identificador</span>
            <span>{!! $xy !!}</span>
          </div>
          <div class="srow">
            <span>Número de factura</span>
            <span>{!! $c->factura !!}</span>
          </div>
          <div class="srow">
            <span>Proveedor</span>
            <span>{!! $c->nombreProveedor($c->proveedor_id) !!}</span>
          </div>
          <div class="srow">
            <span>Usuario que realizo el pedido</span>
            <span>{!! $c->nombreUsuario($c->usuario_id) !!}</span>
          </div>
          <br>
          <table>
            <tr>
              <th>Id</th>
              <th>Producto</th>
              <th colspan="2">Cantidad</th>
              <th>Precio</th>
              <th colspan="2">Estado Entrega</th>
              <th>Fecha Caducidad</th>
            </tr>
            @foreach($detallesCompras as $dc)
              <tr>
                <td>{{$dc->producto_id}}</td>
                <td>{{$dc->nombreProducto($dc->producto_id)}}</td>
                <td>{{$dc->cantidad}}</td>
                <td>{{$dc->nombrePresentacion($dc->presentacion_id)}}</td>
                <td>${{$dc->precio}}</td>
                <?php if($dc->entrega==0){?>
                  <td><center>Pendiente</center></td>
                  <td class="agrUbi" style="cursor:pointer;"><center>Recibir</center></td>
                  <?php }else{?>
                    <td><center>Entregado</center></td>
                    <td><center>{{$dc->nombreUbicacion($dc->ubicacion_id)}}</center></td>
                    <?php }?>
                    <?php if($dc->fecha_caducidad==null){?>
                      <td>No asignada</td>
                      <?php }else{?>
                        <td>{{\Carbon\Carbon::parse($dc->fecha_caducidad)->format('d-m-Y')}}</td>
                        <?php }?>
                      </tr>
                    @endforeach
                  </table>
                </div>
                <!----->
                <div class="tabs oc" id="dos">
                  <div class="enc">
                    <h3 id="txt">Estado</h3>
                  </div>
                  <div class="srow">
                    <span>Estado</span>
                    @if($c->estado == 1)
                      <?php $var = 'Entregado'?>
                    @else
                      <?php $var = 'Pendiente'?>
                    @endif
                    <span>{!! $var !!}</span>
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
            <a id="modalUbi" href="#ex1" rel="modal:open"></a>
          </div>
          <!-- Modal HTML embedded directly into document -->
          <div id="ex1" style="display:none;">
            <p>Ingrese Ubicación:</p>
            <select id="selectUbicaciones" name="selectUbicaciones" onchange="ubi(this)">
              <option value="0">[Seleccione una ubicación]</option>
              @foreach($u as $ub)
                <option value='{{$ub->id}}'>
                  {{$ub->nombre}}
                </option>
              @endforeach
            </select>
            <div class="fila">
              <div><p>¿Tiene fecha de caducidad?</p></div><div><input type="checkbox" value="1" onclick="habilitarCaducidad(this);" id="checkCaducidad"></div>
            </div>{!!Form::date('caducidad', \Carbon\Carbon::now(),['disabled'=>'disabled','id'=>'dateCaducidad'])!!}
            <input name="ubicacion" id="ubicacion" type="button" value="Agregar" onClick="addUbicacion()"/>
          </div>
        </div>
        <input id="temporalProducto" type="hidden" value=0>
        <input id="temporalPresentacion" type="hidden" value=0>
        <input id="compra_id" type="hidden" value="{{$c->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      @stop
