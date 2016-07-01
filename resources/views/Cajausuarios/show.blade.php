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
        <?php $tot=$planilla->cantidad($planilla->id); ?>
        @foreach($tot as $t)
          <th>{{$planilla->nombre($t->desp_id)}}</th>
        @endforeach
        <th>Descuento</th>
        <th>Aportación</th>
        <th>Sueldo neto</th>
      </tr>
      <?php $cont=1; ?>
      @foreach($datos as $d)
        <?php $descuento=$d->valor_renta;
              $aporte=0;?>
      <tr>
        <td>{{$cont}}</td>
        <td>{{$ca->nombreUsuario($d->user_id)}}</td>
        <?php  $total=$d->salario_neto+$d->valor_renta+$d->sumaDescuentos($d->id);?>
        <td>{{number_format($total, 2,'.','')}}</td>
        <td>{{number_format($d->valor_renta, 2,'.','')}}</td>
        <?php $valores=$d->montos($d->id);?>
        @foreach($valores as $v)
          @if($planilla->tipo($v->desp_id))
            <?php $descuento=$descuento+$v->monto;?>
          @else
            <?php $aporte=$aporte+$v->monto;?>
          @endif
          <td>{{number_format($v->monto, 2,'.','')}}</td>
        @endforeach
          <td>{{$descuento}}</td>
          <td>{{$aporte}}</td>
          <td>{{$d->salario_neto}}</td>
      </tr>
      <?php $cont=$cont+1; ?>
      @endforeach
    </table>
  </center>
</div>
@stop
