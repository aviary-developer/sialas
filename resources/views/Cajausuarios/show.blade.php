@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
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
    <h2>Planilla</h2>
    <h3 id="txt"> |{{date("d-m-Y",strtotime($planilla->fecha))}}</h3>
  </div>
  <center>
    <table>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Salario</th>
        <th>Renta</th>
        <?php $tot=$planilla->cantidad($planilla->id);
              $cu=0;
              $sd=$sa=$ssn=0;
              ?>
        @foreach($tot as $t)
          <th>{{$planilla->nombre($t->desp_id)}}</th>
          <?php $ta_d[$cu]=0;
                $cu=$cu+1;?>
        @endforeach
        <th>Descuento</th>
        <th>Aportación</th>
        <th>Sueldo neto</th>
      </tr>
      <?php $cont=1;
            $ta_salario=0;
            $ta_renta=0;
      ?>
      @foreach($datos as $d)
        <?php $descuento=$d->valor_renta;
              $aporte=0;?>
      <tr>
        <td>{{$cont}}</td>
        <td>{{$ca->nombreUsuario($d->user_id)}}</td>
        <?php  $total=$d->salario_neto+$d->valor_renta+$d->sumaDescuentos($d->id);
               $ta_salario=$ta_salario+$total?>
        <td>$ {{number_format($total, 2,'.','')}}</td>
        <td>$ {{number_format($d->valor_renta, 2,'.','')}}</td>
        <?php   $ta_renta=$ta_renta+$d->valor_renta;
                $valores=$d->montos($d->id);
                $cuenta=0;
                ?>
        @foreach($valores as $v)
          @if($planilla->tipo($v->desp_id))
            <?php $descuento=$descuento+$v->monto;?>
          @else
            <?php $aporte=$aporte+$v->monto;?>
          @endif
          <td>$ {{number_format($v->monto, 2,'.','')}}</td>
          <?php $ta_d[$cuenta]=$ta_d[$cuenta]+$v->monto;
                $cuenta=$cuenta+1; ?>
        @endforeach
          <?php $sd=$sd+$descuento;
                $sa=$sa+$aporte;
                $ssn=$ssn+$d->salario_neto;?>
          <td>$ {{number_format($descuento, 2,'.','')}}</td>
          <td>$ {{number_format($aporte, 2,'.','')}}</td>
          <td>$ {{number_format($d->salario_neto, 2,'.','')}}</td>
      </tr>
      <?php $cont=$cont+1; ?>
      @endforeach
      <tr>
        <td></td>
        <td>Total =</td>
        <td>$ {{number_format($ta_salario, 2,'.','')}}</td>
        <td>$ {{number_format($ta_renta, 2,'.','')}}</td>
        @for($i=0; $i <$cu ; $i++)
          <td>${{number_format($ta_d[$i], 2,'.','')}}</td>
        @endfor
        <td>$ {{number_format($sd, 2,'.','')}}</td>
        <td>$ {{number_format($sa, 2,'.','')}}</td>
        <td>$ {{number_format($ssn, 2,'.','')}}</td>
      </tr>
    </table>
    <br>
    <div class="srow">
      <span>Total</span>
      <span>{{number_format($sd+$sa+$ssn, 2, '.', '')}}</span>
    </div>
  </center>
</div>
@stop
