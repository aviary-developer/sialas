@extends('welcome')
@section('layout')
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
        <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext" id="tt">Reporte</span>
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
      <h2>Renta</h2>
        <h3 id='txt'> |Descuentos</h3>
    </div>
    <center>
      <?php $pago=array("Mensual","Quincenal","Semanal") ?>
    @for($i=0;$i<3;$i++)

      <table>

      <h3  id='txt'> <a href={!! asset('/rentas/edit') !!}>Remuneraciones gravadas pagadas de forma {{$pago[$i]}} </a></h3>
       
        <tr>
          <th>Tramo</th>
          <th>Desde</th>
          <th>Hasta</th>
          <th>% a aplicar</th>
          <th>Sobre el exceso</th>
          <th>Mas cuota fija</th>
        </tr>
        @foreach($renta as $r)
            @if($r->pago==$pago[$i])
          <tr>
            <td>{{$r->tramo}}</td>
            <td>{{number_format($r->desde, 2, '.', '')}}</td>
            <td>
              @if($r->tramo!="IV")
              {{number_format($r->hasta, 2, '.', '')}}
            @else
              En adelante
            @endif
            </td>
            <td>
              @if($r->tramo!="I")
              {{$r->porcentaje."%"}}
            @endif
            </td>
            <td>
              @if($r->tramo!="I")
              {{number_format($r->exceso, 2, '.', '')}}
            @else
             Sin retención
            @endif
            </td>
            <td>
              @if($r->tramo!="I")
              {{number_format($r->cuota, 2, '.', '')}}
            @endif
            </td>
          </tr>
        @endif
        @endforeach
      @endfor
      </table>
    </center>
  </div>
@stop
