@extends('welcome')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/prestamos') !!}>
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/prestamos/'.$mob->id.'/edit') !!}>
        <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Editar</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/pagosprestamos/crear/'.$mob->id) !!}>
        <img src={!! asset('/img/WB/vend.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Pago</span>
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
      <h3 id="txt"> |{{$mob->banconombre}}</h3>
    </div>

    <!--Pane-->
    <center>
      <div class="tpcontenido">
        <ul class="supernav">
          <li id ="luno" class="activ" onclick="cambio('uno','luno')">Datos</li>
          <li id="ldos" onclick="cambio('dos','ldos')">Pagos</li>
          <li id="ltres" onclick="cambio('tres','ltres')">Estado</li>
        </ul>

        <div class="tabs ve" id="uno">
          <!---->
          <div class="enc">
            <h3 id="txt">Datos</h3>
          </div>
          <div class="srow">
            <span>Código</span>
            <span>{!! $mob->id!!}</span>
          </div>
          <div class="srow">
            <span>Nombre de la Insitucion</span>
            <span>{!! $mob->banconombre !!}</span>
          </div>
          <div class="srow">
            <span>Cuenta</span>
            <span>{!! $mob->cuenta !!}</span>
          </div>
          <div class="srow">
            <span>Monto</span>
            <span>{!! $mob->monto !!}</span>
          </div>
          <div class="srow">
            <span>interes</span>
            <span>{!! $mob->interes !!}</span>
          </div>
          <div class="srow">
            <span>Numero de Cuotas</span>
            <span>{!! $mob->num_cuotas !!}</span>
          </div>
          <div class="srow">
            <span>Valor de Cuota</span>
            <span>{!! $mob->valor_cuotas !!}</span>
          </div>
          <div class="srow">
            <span>Tiempo de Pago</span>
            <span>{!! $mob->tiempo_pago!!}</span>
          </div>
          <div class="srow">
            <span>Dia de Pago</span>
            <span>{!! $mob->dia_pago !!}</span>
          </div>
          <div class="srow">
            <span>Deposito</span>
            @if($mob->deposito)
            <span>{{$mob->nombreCaja($mob->caja_id)}}</span>
            @else
            <span>{{$mob->nombreBanco($mob->banco_id)}}</span>
            @endif
          </div>
          <div class="srow">
            <span>Garantia</span>
            <span>{!! $mob->garantia !!}</span>
          </div>
        </div>
        <!---->
        <!----->
        <div class="tabs oc" id="dos">
          <div class="enc">
            <h3 id="txt">Pagos</h3>
          </div>

            <div id="graphs"></div>
            <br>
            <div class="srow">
              <span>Capital abonado</span>
              <span>{!! '$ '.number_format($montoTotal,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés abonado</span>
              <span>{!! '$ '.number_format($interTotal,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés moratorio abonado</span>
              <span>{!! '$ '.number_format($moraTotal,2) !!}</span>
            </div>

          <div class="srow">
            <span>Total abonado</span>
            <span>{!! '$ '.number_format($moraTotal+$interTotal+$montoTotal,2) !!}</span>
          </div>
          <div class="srow">
            @if($mob->num_cuotas <= 0)
              <?php $nc = 1; ?>
            @else
              <?php $nc = $mob->num_cuotas; ?>
            @endif
            <span>Cuotas pagadas</span>
            <span>{!! $cuotas.' de '.$nc!!}</span>
          </div>
          <br><br>

            <div class="srow">
              <span>Capital abonado en efectivo</span>
              <span>{!! '$ '.number_format($cc,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés abonado en efectivo</span>
              <span>{!! '$ '.number_format($ic,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés moratorio (efectivo)</span>
              <span>{!! '$ '.number_format($mc,2) !!}</span>
            </div>
          <div class="srow">
            <span>Total abonado en efectivo</span>
            <span>{!! '$ '.number_format($totalc,2) !!}</span>
          </div>
          <div class="srow">
            <span>Cuotas abonadas en efectivo</span>
            <span>{!! $cuotasc !!}</span>
          </div>
          <br>
          <table>
            <tr>
              <th>#</th>
              <th>Fecha</th>
              <th>Caja</th>
              <th>Capital</th>

                <th>Interés</th>
                <th>Mora</th>

            </tr>
            <?php $a = 1; ?>
            @foreach($listac as $k)
              <tr>
                <td><center>{{$a}}</center></td>
                <td><center>{{$k->created_at->format('d-m-Y')}}</center></td>
                <td><center>{{$mob->nombreCaja($k->caja_id)}}</center></td>
                <td><center>{{'$ '.number_format($k->monto,2)}}</center></td>

                  <td><center>{{'$ '.number_format($k->interes,2)}}</center></td>
                  <td><center>{{'$ '.number_format($k->mora,2)}}</center></td>

              </tr>
              <?php $a++; ?>
            @endforeach
          </table>
          <div id="act">
            {!! str_replace ('/?', '?', $listac) !!}
          </div>
          <br><br>
            <div class="srow">
              <span>Capital abonado con cheque</span>
              <span>{!! '$ '.number_format($cb,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés abonado con cheque</span>
              <span>{!! '$ '.number_format($ib,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés moratorio (cheque)</span>
              <span>{!! '$ '.number_format($mb,2) !!}</span>
            </div>
          <div class="srow">
            <span>Total abonado con cheque</span>
            <span>{!! '$ '.number_format($totalb,2) !!}</span>
          </div>
          <div class="srow">
            <span>Cuotas abonadas con cheque</span>
            <span>{!! $cuotasb !!}</span>
          </div>
          <br>
          <table>
            <tr>
              <th>#</th>
              <th>Fecha</th>
              <th>Banco</th>
              <th>Cheque</th>
              <th>Capital</th>
                <th>Interés</th>
                <th>Mora</th>
            </tr>
            <?php $a = 1; ?>
            @foreach($listab as $k)
              <tr>
                <td><center>{{$a}}</center></td>
                <td><center>{{$k->created_at->format('d-m-Y')}}</center></td>
                <td><center>{{$mob->nombreBanco($k->banco_id)}}</center></td>
                <td><center>{{$k->cheque}}</td>
                  <td><center>{{'$ '.number_format($k->monto,2)}}</center></td>

                    <td><center>{{'$ '.number_format($k->interes,2)}}</center></td>
                    <td><center>{{'$ '.number_format($k->mora,2)}}</center></td>

                </tr>
                <?php $a++; ?>
              @endforeach
            </table>
            <div id="act">
              {!! str_replace ('/?', '?', $listac) !!}
            </div>
          </div>
          <!----->
          <!---->
        <div class="tabs oc" id="tres">
            <div class="enc">
              <h3 id="txt">Estado</h3>
            </div>
            <div class="srow">
              <span>Fecha de creación</span>
              <span>{!! $mob->created_at->format('d-m-Y g:i:s a') !!}</span>
            </div>
            <div class="srow">
              <span>Fecha de última edición</span>
              <span>{!! $mob->updated_at->format('d-m-Y g:i:s a') !!}</span>
            </div>
        </div>
        </div>
      </center>
    </div>
    <!--Gráfico-->
    @if($cuotas > 0 )
      <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Capital','Interés','Mora','Total'],
          @foreach($pagoss as $px)
          [
            '{{ $px->created_at->format('d-m-Y') }}',
            {{ $px->monto }},
            {{ $px->interes }},
            {{ $px->mora }},
            {{ $px->monto + $px->mora + $px->interes }}
          ],
          @endforeach
        ]);
        var options = {'title': 'Pagos de realizados',
        'width':700,
        'height':300
      };
      var visualization = new google.visualization.LineChart(document.getElementById('graphs'));
      visualization.draw(data, options);
    }
    </script>
  @endif
@stop
