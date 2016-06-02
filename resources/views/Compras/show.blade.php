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
    <table class="">
<thead>
	<th>Producto</th>
	<th>Presentación</th>
	<th>Cantidad</th>
	<th>Precio</th>
  <th>Estado Entrega</th>
</thead>
@foreach($detallesCompras as $dc)
<tbody>
	<td>{{$dc->nombreProducto($dc->producto_id)}}</td>
	<td>{{$dc->nombrePresentacion($dc->presentacion_id)}}</td>
	<td>{{$dc->cantidad}}</td>
	<td>${{$dc->precio}}</td>
  <td>{!!Form::checkbox('detalle', $dc->id)!!}</td>
</tbody>
@endforeach
</table>
</div>
</div>
@stop
