@extends('welcome')
@section('layout')
  <div class="launcher">
      <div class="lfloat"></div>
      <div class="tooltip">
        <a href={!! asset('/cajausuarios') !!}>
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

        {!!Form::open(['route'=>'cajausuarios.store','method'=>'POST'])!!}
      <table>
        <tr>
          <th>Empleado</th>
          <th>Salario</th>
          <th>Renta</th>
            @foreach($activos as $a)
            <?php
                  $otro[0][]=$a->id;
                  $des[]=$a->valor;
                  $techo[]=$a->techo;
                  $cont=$cont+1;
            ?>
            <th>{{$a->nombre}}</th>
            @endforeach
            <input type="hidden" name="arreglo[]" value='<?php echo serialize($otro[0]) ?>)'>
        </tr>
        <?php $cantidad=0; ?>
        @foreach($usuarios as $u)
          <tr>
            <td>{{$u->nom_usuario}}</td>
            <?php  $arreglo[$cantidad][]=$u->id;?>
            <td>{{number_format($u->salario, 2, '.', '')}}</td>
            <?php   $arreglo[$cantidad][]=number_format($u->salario, 2, '.', '');?>
            <td>{{number_format($renta->renta($u->tipo_salario,$u->salario), 2, '.', '')}}</td>
            <?php  $arreglo[$cantidad][]=number_format($renta->renta($u->tipo_salario,$u->salario), 2, '.', '');?>
            @for($i=0;$i<$cont;$i++)
              @if($techo[$i]!=0 && $u->salario>$techo[$i])
                <?php $vtecho=$techo[$i]; ?>
              @else
                <?php $vtecho=$u->salario; ?>
              @endif
            <td>{{number_format(($vtecho*$des[$i]/100), 2, '.', '')}}</td>
            <?php   $arreglo[$cantidad][]=number_format(($vtecho*$des[$i]/100), 2, '.', '');?>
            @endfor
          </tr>
          <input type="hidden" name="arreglo[]" value='<?php echo serialize($arreglo[$cantidad]) ?>)'>
          <?php  $cantidad=$cantidad+1;?>
        @endforeach
      </table>

    	{!!Form::submit('Guardar')!!}

    	{!!Form::close()!!}

    </center>
  </div>
@stop
