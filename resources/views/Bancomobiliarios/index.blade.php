
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
    <a href={!! asset('/bancomobiliarios/create') !!}>
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
    <h2>Pago de Mobiliarios</h2>
  </div>
  <center>
    <table>
      <tr>
        <th>#</th>
        <th>Mobiliario</th>
        <th>Banco</th>
        <th>monto $</th>
        <th>Cheque</th>
        <th>Fecha de Pago</th>
         <th>Acciones</th>

      </tr>
      <?php $a = 1; ?>
      @foreach($bancomobiliarios as $c)
        <tr>
          <td>{{$a}}</td>
          <td>{{$c->nombreMobiliarios($c->mobiliario_id)}}</td>
          <td>{{$c->nombreBancos($c->banco_id)}}</td>
          <td>{{$c->cantidad}}</td>
          td>{{$c->cheque}}</td>
          <td>{{$c->created_at->format('d-m-Y g:i:s a')}}</td>
          <td>
            <div class="up">
              <img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
              <div class="image">
                <div class="tooltip">
                  <a href={!! asset('/bancomobiliarios/'.$c->id.'/edit') !!}>
                    <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Editar</span>
                </div>

                <div class="tooltip">
                  <a href={!! asset('/bancomobiliarios/'.$c->id) !!}>
                    <img src={!! asset('/img/WB/ver.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Ver</span>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <?php $a++; ?>
      @endforeach
    </table>
    <div id="act">
        {!! str_replace ('/?', '?', $bancomobiliarios) !!}
      </div>
  </center>
</div>
@stop
