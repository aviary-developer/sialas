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
    <?php $valores=$planilla->cantidad($planilla->id); ?>
  </div>
</div>
<div class="fila">
  <div>
    {!!Form::label('ldetalle','Detalle:')!!}
    {!!Form::textarea('detalle')!!}
  </div>
<div >
  {!!Form::label('Salarios:&#09;&#09;'.$planilla->totalSalarioNeto($planilla->id))!!}
  <?php echo "<br>"; ?>
  {!!Form::label('Renta:&#09;&#09;'.$planilla->totalRenta($planilla->id))!!}
  <?php echo "<br>"; ?>
    @foreach($valores as $v)
      {!!Form::label($planilla->nombre($v->desp_id),$planilla->nombre($v->desp_id).':&#09;&#09;'.number_format($planilla->totalPorDesp($planilla->id,$v->desp_id), 2, '.', ''))!!}
      <?php echo "<br>"; ?>
    @endforeach
    <?php echo "<br>"; ?>
    {!!Form::label('ltotal','Total de planilla:')!!}
    {!!Form::text('cantidad',$planilla->totalplanilla($planilla->id))!!}
</div>

</div>
