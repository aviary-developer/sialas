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
    <a href={!! asset('/compras/'.$compra->id.'/edit') !!}>
      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Editar</span>
  </div>
  @if($compra->estado == 1)
    <div class="tooltip">
        @include('Compras.Forms.darDeBaja')
      <span class="tooltiptext">Papelera</span>
    </div>
  @else
    <div class="tooltip">
        @include('Compras.Forms.darDeAlta')
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
    <h2>Detalle Compra</h2>
    <h3 id="txt"> |{{$compra->nombre}}</h3>
  </div>
  <div class="datos">
    <table >
<thead>
	<th>Nombre</th>
	<th>Precio</th>
	<th>Cantidad</th>
	<th>Costo Por Articulos</th>
</thead>
@foreach($detallesCompra as $dv)
<tbody>
	<td>{{$dv->nombreProducto($dv->producto_id)}}</td>
	<td>${{$dv->nombrePresentacion($dv->presentacion_id)}}</td>
	<td>{{$dv->cantidad}}</td>
	<td>${{$dv->precio}}</td>
</tbody>
@endforeach
</table>
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$compra->id !!}</span></pre>
    <pre>Nombre:&#09;&#09;&#09;&#09;&#09;<span>{{ $compra->nombre }}</span></pre>
    <pre>Ubicación:&#09;&#09;&#09;&#09;<span>{{ $compra->ubicacion }}</span></pre>
    @if($compra->estado == 1)
      <?php $var = 'Activo'?>
    @else
      <?php $var = 'En papelera'?>
    @endif
    <pre>Estado:&#09;&#09;&#09;&#09;&#09;<span>{{$var}}</span></pre>
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$compra->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$compra->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
  </div>
</div>
@stop
