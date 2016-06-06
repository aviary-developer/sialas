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
    <h2>Detalle de Compra</h2>
  </div>
  <div class="datos">
    <pre>Número de Factura:&#09;&#09;<span>{!!$c->factura!!}</span></pre>
    <pre>Proveedor:&#09;&#09;&#09;&#09;<span>{{$c->nombreProveedor($c->proveedor_id)}}</span></pre>
    <pre>Usuario:&#09;&#09;&#09;&#09;&#09;<span>{{ $c->nombreUsuario($c->usuario_id) }}</span></pre>
    <pre>Entrega:&#09;&#09;&#09;&#09;&#09;<span>{{$c->estado}}</span></pre>

    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$c->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$c->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
    <table>
<tr>
  <th>Id</th>
	<th>Producto</th>
	<th>Presentación</th>
	<th>Cantidad</th>
	<th>Precio</th>
  <th colspan="2">Estado Entrega</th>
</tr>
@foreach($detallesCompras as $dc)
  <tr>
    <td>{{$dc->producto_id}}</td>
	<td>{{$dc->nombreProducto($dc->producto_id)}}</td>
	<td>{{$dc->nombrePresentacion($dc->presentacion_id)}}</td>
	<td>{{$dc->cantidad}}</td>
	<td>${{$dc->precio}}</td>
  <?php if($dc->entrega==0){?>
  <td>No entregado</td><td class="agrUbi" style="cursor:pointer;">Agregar Ubicación</td>
<?php }else{?>
<td>Entregado</td><td>{{$dc->nombreUbicacion($dc->ubicacion_id)}}</td>
<?php }?>
</tr>
@endforeach
</table>
<a id="modalUbi" href="#ex1" rel="modal:open"></a>
</div>
</div>
<!-- Modal HTML embedded directly into document -->
 <div id="ex1" style="display:none;">
   <p>Ingrese Ubicación:
     <select id="selectUbicaciones" name="selectUbicaciones" onchange="ubi(this)">
					<option value="0">[Seleccione una ubicación]</option>
					@foreach($u as $ub)
					<option value='{{$ub->id}}'>
						{{$ub->nombre}}
					</option>
					@endforeach
				</select></p>
        <!--{!!Form::button('Agregar Ubicación')!!}-->
        <input name="ubicacion" id="ubicacion" type="button" value="Agregar Ubicación" onClick="addUbicacion()"/>
        </div>
 </div>
 <input id="temporalProducto" type="hidden" value=0>
 <input id="temporalPresentacion" type="hidden" value=0>
 <input id="compra_id" type="hidden" value="{{$c->id}}">
 <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
@stop
