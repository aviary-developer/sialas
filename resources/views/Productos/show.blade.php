@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/productos') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/productos/'.$c->id.'/edit') !!}>
      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Editar</span>
  </div>
  @if($c->estado == 1)
    <div class="tooltip">
        @include('Productos.Formularios.darDeBaja')
      <span class="tooltiptext">Papelera</span>
    </div>
  @else
    <div class="tooltip">
        @include('Productos.Formularios.darDeAlta')
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
    <h2>Producto</h2
    <h3 id="txt"> |{{$c->nombre}}</h3>
  </div>
  <div class="datos">
    <div >
     
        <img src={!! asset('/imagenesProductos/ProductoSialas_'.$c->nombre_img) !!} />
      
    </div>
    <pre>Identificador:&#09;&#09;&#09;&#09;<span>{!!$c->id !!}</span></pre>
    <pre>Nombre:&#09;&#09;&#09;&#09;&#09;<span>{{ $c->nombre }}</span></pre>
    @if($c->estado == 1)
      <?php $var = 'Activo'?>
    @else
      <?php $var = 'En papelera'?>
    @endif
    <pre>Estado:&#09;&#09;&#09;&#09;&#09;<span>{{$var}}</span></pre>
    <pre>Marca:&#09;&#09;&#09;&#09;&#09;<span>{{$c->nombreMarcas($c->marca_id)}}</span></pre>
    <pre>Categoria:&#09;&#09;&#09;&#09;<span>{{$c->nombreCategorias($c->categoria_id)}}</span></pre>
    <pre>Fecha de creación:&#09;&#09;&#09;<span>{{$c->created_at->format('d-m-Y g:i:s a')}} </span></pre>
    <pre>Fecha de última edición:&#09;&#09;<span>{{$c->updated_at->format('d-m-Y g:i:s a')}} </span></pre>
  </div>
</div>
@stop