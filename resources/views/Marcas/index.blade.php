@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Papelera</span>
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
    <h2>Marcas</h2>
  </div>
  <center>
    <table id="block">
      <tr>
        <th> Id</th>
        <th> Nombre</th>
        <th colspan="3">Acciones</th>
      </tr>
      <?php $a=1; ?>
      @foreach($marcasActivas as $c)
        <tr>
          <td>{{$c->id}} </td>
          <td> {{$c->nombre}}</td>
          <td>
            {!! link_to_route('marcas.edit', $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
          </td>
        <td>@include('Marcas.Formularios.darDeBaja')</td>
        <td>{!! link_to_route("marcas.show", $title = "Ver más...", $parameters=$c->id, $attributes=[]) !!}
        </tr>
    <?php $a=$a+1; ?>
      @endforeach
    </table>
    <table id="none">
      <tr>
        <th> Id</th>
        <th> Nombre</th>
        <th colspan="3">Acciones</th>
      </tr>
      <?php $a=1; ?>
      @foreach($marcasInactivas as $c)
        <tr>
          <td>{{$c->id}} </td>
          <td> {{$c->nombre}}</td>
          <td>
            {!! link_to_route('marcas.edit', $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
          </td>
        <td>@include('Marcas.Formularios.darDeAlta')</td>
        <td>{!! link_to_route("marcas.show", $title = "Ver más...", $parameters=$c->id, $attributes=[]) !!}
      </tr>
    <?php $a=$a+1; ?>
      @endforeach
    </table>
  </center>
</div>
@stop


