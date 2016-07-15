<?php $valores=$planilla->cantidad($planilla->id); ?>
<div class="fila">
  <div>
    {!!Form::label('lfecha','Fecha de planilla:')!!}
    {!!Form::date('fecha')!!}
  </div>
  <div>
    {!!Form::label('lcaja','Caja:')!!}
    <select name="caja_id">
      @foreach($cajas as $c)
        <option value="{{$c->id}}">{{$c->nombre}}</option>
      @endforeach
    </select>
  </div>
</div>
<div class="fila">
<div >
  <div></div>
  <div class="srow2">
    <span>Salario:</span>
    <span>{{$planilla->totalSalarioNeto($planilla->id)}}</span>
  </div>
  <div class="srow2">
    <span>Renta</span>
    <span>{{$planilla->totalRenta($planilla->id)}}</span>
  </div>
    @foreach($valores as $v)
      <div class="srow2">
        <span>{{$planilla->nombre($v->desp_id)}}</span>
        <span>{{number_format($planilla->totalPorDesp($planilla->id,$v->desp_id), 2, '.', '')}}</span>
      </div>
    @endforeach
    <?php echo "<br>"; ?>
    {!!Form::label('ltotal','Total de planilla:')!!}
    {!!Form::text('cantidad',number_format($planilla->totalplanilla($planilla->id), 2, '.', ''))!!}
</div>
<div>
  {!!Form::label('ldetalle','Detalle:')!!}
  {!!Form::textarea('detalle',null,['placeholder'=>'Detalle de salida','rows'=>'4'])!!}
</div>

</div>
