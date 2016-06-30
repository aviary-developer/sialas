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
    <h3 id="txt"> |</h3>
  </div>
  <center>
    <table>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Salario</th>
      </tr>
      <?php $cont=1; ?>
      @foreach($datos as $d)
      <tr>
        <td>{{$cont}}</td>
        <td>{{$ca->nombreUsuario($d->user_id)}}</td>
        <td></td>
      </tr>
      <?php $cont=$cont+1; ?>
      @endforeach
    </table>
  </center>
</div>
@stop
