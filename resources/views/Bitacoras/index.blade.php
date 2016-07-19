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
      <h2>Bitacoras</h2>
        <h3 id='txt'> |Registradas</h3>
    </div>
    <center>
      <table>
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Detalle</th>
          <th>Fecha de registro</th>
        </tr>
        <?php $cont=1; ?>
        @foreach($bitacoras as $b)
        <tr>
          <td>{{$cont}}</td>
          <td>{{$usr->nombreu($b->id_usuario)}}</td>
          <td>{{$b->detalle}}</td>
          <td>{{$b->created_at->format('d-m-Y g:i:s a')}}</td>
        </tr>
        <?php $cont=$cont+1; ?>
        @endforeach
      </table>
    </center>
  </div>



@stop
