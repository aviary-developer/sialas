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
      @foreach($saldo_caja as $sc)
        <div class="srow">
          <span>Saldo en {{ $sc['nombre'] }}</span>
          <span>{!! '$ '.number_format($sc['saldo'],2) !!}</span>
        </div>
      @endforeach
      @foreach($saldo_banco as $sb)
        <div class="srow">
          <span>Saldo en {{ $sb['nombre'] }}</span>
          <span>{!! '$ '.number_format($sb['saldo'],2) !!}</span>
        </div>
      @endforeach
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
  'pieHole':0.4
};
var visualization = new google.visualization.PieChart(document.getElementById('grafico_efectivo'));
visualization.draw(data, options);
}
</script>
