@extends ('welcome')
@section ('layout')
@if(Session::has('mensaje'))
  <?php $men=Session::get('mensaje');
  echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href='#'>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/prestamos/create') !!}>
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
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
    <h2>Prestamos</h2>
      <h3 id='txt'> |Activos</h3>
    <div class="sep"></div>
  </div>
  <center>
    <table>
      <tr>
        <th>#</th>
        <th>Nombre Banco</th>
        <th>Monto</th>
        <th>Deposito</th>
        <th>Acciones</th>
      </tr>
      <?php $a = 1; ?>
      @foreach($prestamos as $p)
        <tr>
          <td>{{$a}}</td>
          <td>{{$p->banconombre}}</td>
          <td>{{$p->monto}}</td>
          @if($p->deposito)
          <td>{{$p->nombreCaja($p->caja_id)}}</td>
          @else
          <td>{{$p->nombreBanco($p->banco_id)}}</td>
          @endif
          <td>
            <a href={!! asset('/prestamos/'.$p->id) !!}>
              <img src={!! asset('/img/WB/ver.svg') !!} alt="" class="plus"/>
            </a>
          </td>
        </tr>
        <?php $a++; ?>
      @endforeach
    </table>
  </center>
</div>
@stop
