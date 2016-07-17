<center>
  <div class="tpcontenido">
    <ul class="supernav">
      <li id="luno" class="activ" onclick="cambio('uno','luno')">Efectivo</li>
      <li id="ldos" onclick="cambio('dos','ldos')">Ingresos</li>
    </ul>
    {{--  --}}
    <div class="tabs ve" id="uno">
      <div class="enc">
        <h3 id="txt">Efectivo</h3>
      </div>

      <div id="grafico_efectivo"></div>

      <br>
      <div class="srow">
        <span>Efectivo en caja</span>
        <span>{!! '$ '.number_format($saldo_actual_caja,2) !!}</span>
      </div>
      <div class="srow">
        <span>Efectivo en banco</span>
        <span>{!! '$ '.number_format($saldo_actual_banco,2) !!}</span>
      </div>
      <div class="srow">
        <span>Efectivo total</span>
        <span>{!! '$ '.number_format($saldo_actual_banco+$saldo_actual_caja,2) !!}</span>
      </div>
    </div>
    {{--  --}}
    <div class="tabs oc" id = "dos">
      <div class="enc">
        <h3 id="txt">Ingresos</h3>
      </div>
    </div>
  </div>
</center>
{{-- Gráficos --}}
<script type="text/javascript">
google.charts.load("current", {packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Efectivo','Monto'],
    [
      'Caja',
      {{ $saldo_actual_caja }},
    ],
    [
      'Banco',
      {{ $saldo_actual_banco }}
    ]
  ]);
  var options = {'title': 'Efectivo actual',
  'width':700,
  'height':300,
  'pieHole':0.4
};
var visualization = new google.visualization.PieChart(document.getElementById('grafico_efectivo'));
visualization.draw(data, options);
}
</script>
