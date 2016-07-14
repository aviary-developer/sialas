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
          @if($salario==1)
            <h3 id='txt'> |Mensual</h3>
          @elseif($salario==2)
            <h3 id='txt'> |Quincenal</h3>
          @else
            <h3 id='txt'> |Semanal</h3>
          @endif
          </div>
          <div class="enc">
          {!!Form::open(['route'=>'cajausuarios.create','method'=>'GET'])!!}
          <input type="hidden" name="salario" value="1">
          {!! Form::submit('Mensual') !!}
          {!! Form::close() !!}

          {!!Form::open(['route'=>'cajausuarios.create','method'=>'GET'])!!}
          <input type="hidden" name="salario" value="2">
          {!! Form::submit('Quincenal') !!}
          {!! Form::close() !!}

          {!!Form::open(['route'=>'cajausuarios.create','method'=>'GET'])!!}
          <input type="hidden" name="salario" value="3">
          {!! Form::submit('Mensual') !!}
          {!! Form::close() !!}

          {!!Form::open(['route'=>'cajausuarios.store','method'=>'POST'])!!}
        </div>
        <center>
        <table>
          <tr>
            <th>Empleado</th>
            <th>Salario</th>
            <th>Renta</th>
              @foreach($activos as $a)
              <?php
                    $otro[0][]=$a->id;
                    $des[]=$a->valor;
                    $tipo[]=$a->tipo;
                    $techo[]=$a->techo;
                    $des_p[$cont]=0;
                    $cont=$cont+1;
              ?>
              <th>{{$a->nombre}}</th>
              @endforeach
              <th>Descuento</th>
              <th>Aportación</th>
              <th>Sueldo neto</th>
              <input type="hidden" name="arreglo[]" value='<?php echo serialize($otro[0]) ?>)'>
          </tr>
          <?php $cantidad=0;
                $ta_salario=0;
                $ta_renta=0;
                $ta_descuento=0;
                $ta_aporte=0;
                $ta_salario_des=0;
                ?>
          @foreach($usuarios as $u)
            <?php $descuento=0;
                  $aporte=0; ?>
            <tr>
              <td>{{$u->nom_usuario}}</td>
              <?php  $arreglo[$cantidad][]=$u->id;
                     $salario=number_format($u->salario, 2, '.', '');
                     $ta_salario=$ta_salario+$salario;?>
              <td>{{$salario}}</td>
              <?php   $arreglo[$cantidad][]=$salario;
                      $vrenta=number_format($renta->renta($u->tipo_salario,$u->salario), 2, '.', '');
                      $ta_renta=$ta_renta+$vrenta;
                      ?>
              <td>{{$vrenta}}</td>
              <?php  $arreglo[$cantidad][]=$vrenta;
                      $descuento=$vrenta;
                      $primero=true;?>
              @for($i=0;$i<$cont;$i++)
                @if($techo[$i]!=0 && $u->salario>$techo[$i])
                  <?php $vtecho=$techo[$i]; ?>
                @else
                  <?php $vtecho=$u->salario; ?>
                @endif
                  <?php $desp=number_format(($vtecho*$des[$i]/100), 2, '.', ''); ?>
                  <?php $des_p[$i]=$des_p[$i]+$desp;?>

              <td>{{$desp}}</td>
              <?php   $arreglo[$cantidad][]=$desp;
                      if($tipo[$i]==trim('Descuento')){
                        $descuento=$descuento+$desp;
                      }else{
                        $aporte=$aporte+$desp;
                      }
                      $primero=false;
              ?>
              @endfor
              <?php  $ta_descuento=$ta_descuento+$descuento;
                     $ta_aporte=$ta_aporte+$aporte;
                     $ta_salario_des=$ta_salario_des+$salario-$descuento;
              ?>
              <td>{{number_format($descuento, 2, '.', '')}}</td>
              <td>{{number_format($aporte, 2, '.', '')}}</td>
              <td>{{$sd=number_format(($salario-$descuento), 2, '.', '')}}</td>
            </tr>
            <input type="hidden" name="arreglo[]" value='<?php echo serialize($arreglo[$cantidad]) ?>)'>
            <?php  $cantidad=$cantidad+1;?>
          @endforeach
            <tr>
              <td>Totales= </td>
              <td>{{number_format($ta_salario, 2, '.', '')}}</td>
              <td>{{number_format($ta_renta, 2, '.', '')}}</td>
              @for($i=0; $i < $cont; $i++)
                <td>{{number_format($des_p[$i], 2, '.', '')}}</td>
              @endfor
              <td>{{number_format($ta_descuento, 2, '.', '')}}</td>
              <td>{{number_format($ta_aporte, 2, '.', '')}}</td>
              <td>{{number_format($ta_salario_des, 2, '.', '')}}</td>
            </tr>
        </table>

      	{!!Form::submit('Guardar')!!}

      	{!!Form::close()!!}

      </center>
    </div>
  @stop
