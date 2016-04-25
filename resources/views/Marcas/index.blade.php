@extends('welcome')
@section('layout')
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Nuevo</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
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
        <th>
          Id
        </th>
        <th>
          Nombre
        </th>
        <th>
          Acciones
        </th>
      </tr>
      @foreach($marcas as $c)
        <tr>
          <td>
            {{$c->id}}
          </td>
          <td>
            {{$c->nombre}}
          </td>
          <td>
            {!! link_to_route('marcas.edit', $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
          </td>
        </tr>
      @endforeach
    </table>
    <table id="none">
      <tr>
        <th>
          Id
        </th>
        <th>
          Nombre
        </th>
        <th>
          Acciones
        </th>
      </tr>
      @foreach($marcas as $c)
        <tr>
          <td>
            {{$c->id}}
          </td>
          <td>
            {{$c->nombre}}
          </td>
          <td>
            {!! link_to_route('marcas.edit', $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
          </td>
        </tr>
      @endforeach
    </table>
  </center>
</div>
@stop


