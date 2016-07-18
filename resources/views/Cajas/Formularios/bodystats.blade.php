<center>
  <div class="tpcontenido">
    <ul class="supernav">
      <li id="luno" class="activ" onclick="cambio('uno','luno')">Efectivo</li>
      <li id="ldos" onclick="cambio('dos','ldos')">Ingresos</li>
      <li id="ltres" onclick="cambio('tres','ltres')">Egresos</li>
      <li id="lcuatro" onclick="cambio('cuatro','lcuatro')">Stock</li>
    </ul>
    {{--  --}}
    <div class="tabs ve" id="uno">
      <div class="enc">
        <h3 id="txt">Efectivo</h3>
      </div>

      <div id="grafico_efectivo" class="graphs"></div>

      <br>
      <?php $saldo_total = 0; ?>
      @foreach($saldo_caja as $sc)
        <div class="srow">
          <span>Saldo en {{ $sc['nombre'] }}</span>
          <span>{!! '$ '.number_format($sc['saldo'],2) !!}</span>
        </div>
        <?php $saldo_total += $sc['saldo']; ?>
      @endforeach
      @foreach($saldo_banco as $sb)
        <div class="srow">
          <span>Saldo en {{ $sb['nombre'] }}</span>
          <span>{!! '$ '.number_format($sb['saldo'],2) !!}</span>
        </div>
        <?php $saldo_total += $sb['saldo']; ?>
      @endforeach
      <div class="srow">
        <span>Saldo total</span>
        <span>{!! '$ '.number_format($saldo_total,2) !!}</span>
      </div>
    </div>
    {{--  --}}
    <div class="tabs oc" id = "dos">
      <div class="enc">
        <h3 id="txt">Ingresos</h3>
      </div>
      <div id="grafico_filtro_ingreso" class="graphs">
        <div id="grafico_ingresos" class="graphs"></div>
        <div id="filtro_ingresos" class="graphs"></div>
      </div>
    </div>
    {{--  --}}
    <div class="tabs oc" id = "tres">
      <div class="enc">
        <h3 id="txt">Egresos</h3>
      </div>
      <div id="grafico_filtro_egreso" class="graphs">
        <div id="grafico_egresos" class="graphs"></div>
        <div id="filtro_egresos" class="graphs"></div>
      </div>
    </div>
    {{--  --}}
    <div class="tabs oc" id="cuatro">
      <div class="enc">
        <h3 id="txt">Stock</h3>
      </div>

      <div id="grafico_stock" class="graphs"></div>

    </div>
  </div>
</center>
{{-- Gráficos --}}
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart','controls']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Lugar','Monto'],
    @foreach($saldo_caja as $sc)
    [
      '{{ $sc['nombre'] }}',
      {{ $sc['saldo'] }}
    ],
    @endforeach
    @foreach($saldo_banco as $sb)
    [
      '{{ $sb['nombre'] }}',
      {{ $sb['saldo'] }}
    ],
    @endforeach
  ]);
  var options = {'title': 'Efectivo actual',
  'width':700,
  'height':300,
  'pieHole':0.4,
  'is3D':true
};
var visualization = new google.visualization.PieChart(document.getElementById('grafico_efectivo'));
visualization.draw(data, options);
}
</script>
{{-- Gráfico 2 --}}
<script type="text/javascript">
google.charts.setOnLoadCallback(drawDashboard);
function drawDashboard() {
  var data = google.visualization.arrayToDataTable([
    ['Fecha','Prestamos','Ventas'],
    @foreach($lista_prestamo as $lp)
      [
        new Date('{{ $lp->fecha_prestamos }}'),
        @if($lp->xt == 0)
          {{ $lp->total }},{{0}}
        @else
          {{0}},{{ $lp->total }}
        @endif
      ],
    @endforeach
  ]);
  var dashboard = new google.visualization.Dashboard(document.getElementById('grafico_filtro_ingreso'));
  var donutRangeSlider = new google.visualization.ControlWrapper({
    'controlType': 'ChartRangeFilter',
    'containerId': 'filtro_ingresos',
    'state': {
      'range':{
        'start': new Date('{{$dia3->format('Y-m-d')}}'),
        'end': new Date('{{$hoy->format('Y-m-d')}}')
      }
    },
    'options': {
      'filterColumnLabel': 'Fecha',
      'ui': {
        'chartType': 'AreaChart',
        'chartOptions':{
          'enableInteractivity': false,
          'chartArea': {'width': '75%'},
          'legend': {'position': 'none'},
          'hAxis': {'textPosition': 'in'},
          'vAxis': {
            'textPosition': 'none',
            'gridlines': {'color': 'none'}
          },
          'height':50,
          'width':700
        }
      }
    }
  });
  var pieChart = new google.visualization.ChartWrapper({
    'chartType': 'AreaChart',
    'containerId': 'grafico_ingresos',
    'options': {
      'title': 'Ingresos',
      'width': 700,
      'height': 300,
      'chartArea': '100%',
      'hAxis': {
        'textPosition':'on',
        'format': 'd MMM'
      }
    }
  });
  dashboard.bind(donutRangeSlider, pieChart);
  dashboard.draw(data);
}
</script>
{{-- Gráfico 3 --}}
<script type="text/javascript">
google.charts.setOnLoadCallback(drawDashboard);
function drawDashboard() {
  var data = google.visualization.arrayToDataTable([
    ['Fecha','Servicios','Mobiliarios','Compras','Prestamos','Reparaciones','Planillas'],
    @foreach($grupo as $gp)
      [
        new Date("{{$gp['fecha']}}"),
        {{$gp['servicio']}},
        {{$gp['mobiliario']}},
        {{$gp['compra']}},
        {{$gp['prestamo']}},
        {{$gp['reparacion']}},
        {{$gp['planilla']}},
      ],
    @endforeach
  ]);

  var dashboard = new google.visualization.Dashboard(document.getElementById('grafico_filtro_egreso'));
  var donutRangeSlider = new google.visualization.ControlWrapper({
    'controlType': 'ChartRangeFilter',
    'containerId': 'filtro_egresos',
    'state': {
      'range':{
        'start': new Date('{{$dia3->format('Y-m-d')}}'),
        'end': new Date('{{$hoy->format('Y-m-d')}}')
      }
    },
    'options': {
      'filterColumnLabel': 'Fecha',
      'ui': {
        'chartType': 'AreaChart',
        'chartOptions':{
          'enableInteractivity': false,
          'chartArea': {'width': '75%'},
          'legend': {'position': 'none'},
          'hAxis': {'textPosition': 'in'},
          'vAxis': {
            'textPosition': 'none',
            'gridlines': {'color': 'none'}
          },
          'height':50,
          'width':700
        }
      }
    }
  });
  var areaChart = new google.visualization.ChartWrapper({
    'chartType': 'AreaChart',
    'containerId': 'grafico_egresos',
    'options': {
      'title': 'Egresos',
      'width': 700,
      'height': 300,
      'chartArea': '100%',
      'hAxis': {
        'textPosition':'on',
        'format': 'd MMM'
      }
    }
  });
  dashboard.bind(donutRangeSlider, areaChart);
  dashboard.draw(data);
}
</script>
{{-- Gráficos 4--}}
<script type="text/javascript">
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Producto','Cantidad'],
    @foreach($stock as $sc)
    [
      '{{ $sc['nombre'] }}',
      {{ $sc['cantidad'] }}
    ],
    @endforeach
  ]);
  var options = {'title': 'Stock por Producto',
  'width':700,
  'height':300,
  'pieHole':0.4,
  'is3D':true
};
var visualization = new google.visualization.PieChart(document.getElementById('grafico_stock'));
visualization.draw(data, options);
}
</script>
