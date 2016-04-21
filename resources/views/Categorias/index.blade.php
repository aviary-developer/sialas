@extends ('welcome')
@section ('layout')
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
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Ayuda</span>
  </div>
</div>
<div class="panel">
  <table>
    <tr>
      <th>
        Id
      </th>
      <th>
        Nombre
      </th>
    </tr>
    @foreach($categoria as $c)
    <tr>
      <td>
        {{$c->id}}
      </td>
      <td>
        {{$c->nombre}}
      </td>
      <td>
        {!! link_to_route('categorias.edit', $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
      </td>
    </tr>
    @endforeach
  </table>
</div>
@stop
