@extends('welcome')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/mobiliarios') !!}>
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/mobiliarios/'.$mob->id.'/edit') !!}>
        <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Editar</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/pagos/crear/'.$mob->id) !!}>
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
      <h2>Mobiliarios</h2>
      <h3 id="txt"> |{{$mob->nombre}}</h3>
    </div>

    <!--Pane-->
    <center>
      <div class="tpcontenido">
        <ul class="supernav">
          <li id ="luno" class="activ" onclick="cambio('uno','luno')">Datos</li>
          <li id="ldos" onclick="cambio('dos','ldos')">Compra</li>
          <li id="ltres" onclick="cambio('tres','ltres')">Pagos</li>
          <li id="lcinco" onclick="cambio('cinco','lcinco')">Reparaciones</li>
          <li id="lseis" onclick="cambio('seis','lseis')">Depreciación</li>
          <li id="lcuatro" onclick="cambio('cuatro','lcuatro')">Estado</li>
        </ul>
        <div class="tabs ve" id="uno">
          <!---->
          <div class="enc">
            <h3 id="txt">Datos</h3>
          </div>
          <div class="srow">
            <span>Código</span>
            <span>{!! $mob->codigoTipos($mob->tipo_id).'-'.$mob->codigo !!}</span>
          </div>
          <div class="srow">
            <span>Nombre</span>
            <span>{!! $mob->nombre !!}</span>
          </div>
          <div class="srow">
            <span>Tipo</span>
            <span>{!! $mob->nombreTipos($mob->tipo_id) !!}</span>
          </div>
          <div class="srow">
            <span>Descripción</span>
            <span>{!! $mob->descripcion !!}</span>
          </div>
        </div>
        <!---->
        <div class="tabs oc" id="dos">
          <div class="enc">
            <h3 id="txt">Compra</h3>
          </div>
          <div class="srow">
            <span>Proveedor</span>
            <span>{!! $mob->nombreProveedor($mob->proveedor_id) !!}</span>
          </div>
          <div class="srow">
            <span>Estado de compra</span>
            @if($mob->nuevo == 1)
              <?php $varx = 'Nuevo'?>
            @else
              <?php $varx = 'Usado'?>
            @endif
            <span>{!! $varx !!}</span>
          </div>
          @if($mob->nuevo == 0)
            <div class="srow">
              <span>Años de servicio</span>
              <span>{!! $mob->anios !!}</span>
            </div>
          @endif
          <div class="srow">
            <span>Valor</span>
            <span>{!! '$ '.number_format($mob->precio,2) !!}</span>
          </div>
          <div class="srow">
            <span>IVA</span>
            <span>{!! '$ '.number_format($mob->iva,2) !!}</span>
          </div>
          <div class="srow">
            <span>Tipo de compra</span>
            @if($mob->credito == 1)
              <?php $vary = 'Al crédito'?>
            @else
              <?php $vary = 'Al contado'?>
            @endif
            <span>{!! $vary !!}</span>
          </div>
          @if($mob->credito == 1)
            <div class="srow">
              <span>Número de cuenta</span>
              <span>{!! $mob->cuenta !!}</span>
            </div>
            <div class="srow">
              <span>Número de cuotas</span>
              <span>{!! $mob->num_cuotas !!}</span>
            </div>
            <div class="srow">
              <span>Valor de cuotas</span>
              <span>{!! '$ '.number_format($mob->val_cuotas,2) !!}</span>
            </div>
            <div class="srow">
              <span>Interés</span>
              <span>{!! number_format($mob->interes,2).' %' !!}</span>
            </div>
            <div class="srow">
              <span>Tiempo de pago</span>
              @if($mob->tiempo_pago == 0)
                <?php $varz = 'Semanal'?>
              @elseif($mob->tiempo_pago == 1)
                <?php $varz = 'Quincenal'?>
              @elseif($mob->tiempo_pago == 2)
                <?php $varz = 'Mensual'?>
              @else
                <?php $varz = 'Anual'?>
              @endif
              <span>{!! $varz !!}</span>
            </div>
          @endif
          <div class="srow">
            <span>Fecha de compra</span>
            <span>{!! $mob->fecha_compra->format('d-m-Y') !!}</span>
          </div>
        </div>
        <!----->
        <div class="tabs oc" id="tres">
          <div class="enc">
            <h3 id="txt">Pagos</h3>
          </div>
          @if($mob->credito)
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
          @endif
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
          <br>
          @if($cuotasc)
            <br>
            @if($mob->credito)
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
            @endif
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
                @if($mob->credito)
                  <th>Interés</th>
                  <th>Mora</th>
                @endif
              </tr>
              <?php $a = 1; ?>
              @foreach($listac as $k)
                <tr>
                  <td><center>{{$a}}</center></td>
                  <td><center>{{$k->created_at->format('d-m-Y')}}</center></td>
                  <td><center>{{$mob->nombreCaja($k->caja_id)}}</center></td>
                  <td><center>{{'$ '.number_format($k->monto,2)}}</center></td>
                  @if($mob->credito)
                    <td><center>{{'$ '.number_format($k->interes,2)}}</center></td>
                    <td><center>{{'$ '.number_format($k->mora,2)}}</center></td>
                  @endif
                </tr>
                <?php $a++; ?>
              @endforeach
            </table>
            <div id="act">
              {!! str_replace ('/?', '?', $listac) !!}
            </div>
            <br>
          @endif
          <br>
          @if($cuotasb)
            @if($mob->credito)
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
            @endif
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
                @if($mob->credito)
                  <th>Interés</th>
                  <th>Mora</th>
                @endif
              </tr>
              <?php $a = 1; ?>
              @foreach($listab as $k)
                <tr>
                  <td><center>{{$a}}</center></td>
                  <td><center>{{$k->created_at->format('d-m-Y')}}</center></td>
                  <td><center>{{$mob->nombreBanco($k->banco_id)}}</center></td>
                  <td><center>{{$k->cheque}}</td>
                    <td><center>{{'$ '.number_format($k->monto,2)}}</center></td>
                    @if($mob->credito)
                      <td><center>{{'$ '.number_format($k->interes,2)}}</center></td>
                      <td><center>{{'$ '.number_format($k->mora,2)}}</center></td>
                    @endif
                  </tr>
                  <?php $a++; ?>
                @endforeach
              </table>
              <div id="act">
                {!! str_replace ('/?', '?', $listac) !!}
              </div>
            @endif
          </div>
          <!----->
          <div class="tabs oc" id = "cinco">
            <div class="enc">
              <h3 id="txt">Reparaciones</h3>
            </div>
            @if($totalreparacion >0)
              @if($totpagorep>1)
                <div id="graphsrepar"></div>
                <br>
              @endif
              <div class="srow">
                <span>Reparaciones al contado</span>
                <span>{!! $totreparn; !!}</span>
              </div>
              <div class="srow">
                <span>Reparaciones al crédito</span>
                <span>{!! $totreparc; !!}</span>
              </div>
              <div class="srow">
                <span>Total de reparaciones</span>
                <span>{!! $totalreparacion !!}</span>
              </div>
              <br>
              <div class="srow">
                <span>Valor total al contado</span>
                <span>{!! '$ '.number_format($valreparn,2); !!}</span>
              </div>
              <div class="srow">
                <span>Valor total al crédito</span>
                <span>{!! '$ '.number_format($valreparc,2); !!}</span>
              </div>
              <div class="srow">
                <span>Valor total en reparaciones</span>
                <span>{!! '$ '.number_format($valtotal,2); !!}</span>
              </div>
              <div class="srow">
                <span>IVA total en reparaciones</span>
                <span>{!! '$ '.number_format($ivatotal,2); !!}</span>
              </div>
              <br>
              <table>
                <tr>
                  <th>#</th>
                  <th>Proveedor</th>
                  <th>Deposito</th>
                  <th>Entrega</th>
                  <th>Precio</th>
                  <th>IVA</th>
                  <th>Crédito</th>
                  <th>Pago</th>
                </tr>
                <?php $a = 1; ?>
                @foreach($reparar as $k)
                  <tr>
                    <td>{{$a}}</td>
                    <td>{{$mob->nombreProveedor($k->proveedor_id)}}</td>
                    <td><center>{{$k->fecha_deposito}}</center></td>
                    <td><center>
                      @if($k->fecha_entrega == null)
                        {{ "Pendiente" }}
                      @else
                        {{$k->fecha_entrega}}
                      @endif
                    </center></td>
                    <td><center>{{'$'.number_format($k->precio,2)}}</center></td>
                    <td><center>{{'$'.number_format($k->iva,2)}}</center></td>
                    <td><center>
                      @if($k->credito)
                        {{ "Si" }}
                      @else
                        {{ "No" }}
                      @endif
                    </center></td>
                    <td>
                      <a href={!! asset('/pagoreparaciones/crear/'.$k->id) !!}>
                        <img src={!! asset('/img/WB/vend.svg') !!} alt="" class="plus"/>
                      </a>

                    </td>
                  </tr>
                  <?php $a++; ?>
                @endforeach
              </table>
              <br>
              <div class="srow">
                <span>Pagos de reparaciones</span>
                <span>{!! $totpagorep; !!}</span>
              </div>
              <div class="srow">
                <span>Valor de pago de reparaciones</span>
                <span>{!! '$ '.number_format($prereptot,2); !!}</span>
              </div>
            @else
              <p>
                No hay reparaciones registradas
              </p>
            @endif
          </div>
          <!---->
          <div class="tabs oc" id="seis">
            <div class="enc">
              <h3 id="txt">Depreciación</h3>
            </div>
            @if($mob->fecha_compra->day < 15)
              <?php $inicio = $mob->fecha_compra->startOfMonth(); ?>
            @else
              <?php $inicio = $mob->fecha_compra->addMonth(1)->startOfMonth(); ?>
            @endif
            <div class="srow">
              <span>Valor inicial del bien</span>
              <span>{!! '$'.number_format($mob->precio,2) !!}</span>
            </div>
            <div class="srow">
              <span>Inicio de depreciación</span>
              <span>{!! $inicio->format('d-m-Y') !!}</span>
            </div>
            <?php $tiempo = $mob->depreTipo($mob->tipo_id)-$mob->anios; $fl = false;?>
            @if($tiempo <= 0)
              <?php $tiempo = 0; $fl = true; ?>
            @endif
            <div class="srow">
              <span>Tiempo a depreciar</span>
              <span>{!! $tiempo.' años' !!}</span>
            </div>
            @if(!$fl)
              <?php $depanual = $mob->precio/$tiempo; ?>
            @else
              <?php $depanual = 0; ?>
            @endif
            <br>
            <div class="srow">
              <span>Depreciación anual</span>
              <span>{!! '$ '.number_format($depanual,2) !!}</span>
            </div>
            <?php $depmensual = $depanual/12; ?>
            <div class="srow">
              <span>Depreciación mensual</span>
              <span>{!! '$ '.number_format($depmensual,2) !!}</span>
            </div>
            @if(!$fl)
              <?php $tdepreciado = $inicio->diffInMonths($hoy); ?>
            @else
              <?php $tdepreciado = 0; ?>
            @endif

            @if($tdepreciado > $tiempo*12)
              <?php $tdepreciado = $tiempo*12; ?>
            @endif
            <div class="srow">
              <span>Tiempo depreciado</span>
              <span>{!! $tdepreciado.' meses' !!}</span>
            </div>
            <div class="srow">
              <span>Depreciación acumulada</span>
              <span>{!! '$ '.number_format(($depmensual*$tdepreciado),2) !!}</span>
            </div>
            @if(!$fl)
              <?php $valor = $mob->precio ?>
            @else
              <?php $valor = 0; ?>
            @endif
            <div class="srow">
              <span>Valor actual</span>
              <span>{!! '$ '.number_format($valor - ($depmensual*$tdepreciado),2) !!}</span>
            </div>
          </div>
          <!---->
          <div class="tabs oc" id="cuatro">
            <div class="enc">
              <h3 id="txt">Estado</h3>
            </div>
            <div class="srow">
              <span>Estado</span>
              @if($mob->estado == 0)
                <?php $var = 'Vendido'?>
              @elseif($mob->estado == 1)
                <?php $var = 'En Uso'?>
              @elseif($mob->estado == 2)
                <?php $var = 'Desechado'?>
              @elseif($mob->estado == 3)
                <?php $var = 'En reparación'?>
              @else
                <?php $var = 'Donado'?>
              @endif
              <span>{!! $var !!}</span>
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
    @if($cuotas > 0 && $mob->credito)
      <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Capital','Interés','Mora','Total'],
          @foreach($pagoss as $px)
          [
            '{{ $px->created_at->format('d-m-Y') }}',
            {{ $px->monto}},
            {{ $px->interes }},
            {{ $px->mora }},
            {{ $px->monto + $px->mora + $px->interes }}
          ],
          @endforeach
        ]);
        var options = {'title': 'Pagos realizados',
        'width':700,
        'height':300
      };
      var visualization = new google.visualization.LineChart(document.getElementById('graphs'));
      visualization.draw(data, options);
    }
    </script>
  @endif
  @if($totpagorep > 1)
    <?php $sum = 0; ?>
    <script type="text/javascript">
    //google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Fecha', 'Pago', 'Acumulado'],
        @foreach($pagosp as $px)
        [
          <?php $sum = $sum + $px->monto + $px->mora + $px->interes; ?>
          '{{ $px->fecha_deposito }}',
          {{ $px->monto + $px->mora + $px->interes }},
          {{ $sum }}
        ],
        @endforeach
      ]);
      var options = {'title': 'Pagos de reparaciones',
      'width':700,
      'height':300
    };
    var visualization = new google.visualization.LineChart(document.getElementById('graphsrepar'));
    visualization.draw(data, options);
  }
  </script>
@endif
@stop
