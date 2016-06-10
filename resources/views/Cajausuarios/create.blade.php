@extends('welcome')
@section('layout')
  <div class="launcher">
      <div class="lfloat"></div>
      <div class="tooltip">
        <a href={!! asset('/descuentoaportes') !!}>
          <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
        </a>
        <span class="tooltiptext">Atras</span>
      </div>
      <div class="tooltip">
        <a href="#">
          <img src={!! asset('/img/WB/ayu.svg') !!} alt="" class="circ"/>
        </a>
        <span class="tooltiptext">Ayuda</span>
      </div>
    </div>
    <?php $cont=0; ?>
    <div class="panel">
      <div class="enc">
        <h2>Planilla</h2>
        <h3 id='txt'> |Empleados</h3>
      </div>
      <center>
      <table>
        <tr>
          <th>Empleado</th>
          <th>Salario</th>
          <th>Renta</th>
            @foreach($activos as $a)
            <?php $des[]=$a->valor;
                  $techo[]=$a->techo;
                  $cont=$cont+1;
            ?>
            <th>{{$a->nombre}}</th>
            @endforeach
        </tr>
        @foreach($usuarios as $u)
          <tr>
            <td>{{$u->nom_usuario}}</td>
            <td>{{number_format($u->salario, 2, '.', '')}}</td>
            <td>{{number_format($renta->renta($u->tipo_salario,$u->salario), 2, '.', '')}}</td>
            @for($i=0;$i<$cont;$i++)
              @if($techo[$i]!=0 && $u->salario>$techo[$i])
                <?php $u->salario=$techo[$i]; ?>
              @endif
            <td>{{number_format(($u->salario*$des[$i]/100), 2, '.', '')}}</td>
            @endfor
          </tr>
        @endforeach
      </table>
    </center>
  </div>
@stop
