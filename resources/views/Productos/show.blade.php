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
      <h2>Producto</h2>
      <h3 id="txt"> |{{$c->nombre}}</h3>
    </div>
    <?php
    $id = $c->id;
    $xy = str_pad($id,10,"0",STR_PAD_LEFT);
    ?>
    <center>
      <div class="enc">
        <h3 id="txt">Datos</h3>
      </div>
      <div >
        <img class="icirc" src={!! asset('/imagenesProductos/ProductoSialas_'.$c->nombre_img) !!} />
      </div>
      <div class="srow">
        <span>Identificador</span>
        <span>{!! $xy !!}</span>
      </div>
      <div class="srow">
        <span>Nombre</span>
        <span>{!! $c->nombre !!}</span>
      </div>
      <div class="srow">
        <span>Marca</span>
        <span>{!! $c->nombreMarcas($c->marca_id) !!}</span>
      </div>
      <div class="srow">
        <span>Categoría</span>
        <span>{!! $c->nombreCategorias($c->categoria_id) !!}</span>
      </div>
      <div class="srow">
        <span>Estado</span>
        @if($c->estado == 1)
          <?php $var = 'Activo'?>
        @else
          <?php $var = 'En papelera'?>
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

      <!-------->
      <div class="enc">
        <h3 id="txt">Relaciones</h3>
      </div>

      <div class="srow">
        <span>Presentaciones relacionadas</span>
        <span>{!! $w !!}</span>
      </div>
      <br>
      <table>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Equivalencia</th>
          <th>Ganancia</th>
        </tr>
        <?php $a = 1; ?>
        @foreach($p as $k)
          <tr>
            <td>{{$a}}</td>
            <td>{{$k->nombre}}</td>
            <td><center>{{$k->equivale}}</center></td>
            <td>{{$k->ganancia}}</td>
          </tr>
          <?php $a++; ?>
        @endforeach
      </table>
      <div id="act">
        {!! str_replace ('/?', '?', $p) !!}
      </div>
    </center>
  </div>
@stop
