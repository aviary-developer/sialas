<div class="fila">
  <div>
    {!!Form::label('lfecha','Fecha de planilla:')!!}
    {!!Form::date('fecha')!!}
  </div>
  <div>
    {!!Form::label('lcaja','Caja:')!!}
    <select name="caja">
      @foreach($cajas as $c)
        <option value="{{$c->id}}">{{$c->nombre}}</option>
      @endforeach
    </select>
    <?php $valores=$planilla->cantidad($planilla->id); ?>
  </div>
</div>
<div class="fila">
<div >
    @foreach($valores as $v)
      {!!Form::label($planilla->nombre($v->desp_id),$planilla->nombre($v->desp_id).':')!!}
      <?php echo "<br>"; ?>
      
      {!!Form::text('{{$planilla->nombre($v->desp_id)}}',null)!!}

    @endforeach
    {!!Form::label('ltotal','Total de planilla:')!!}
    {!!Form::text('total',$planilla->totalplanilla($planilla->id))!!}
</div>
<div>
  {!!Form::label('ldetalle','Detalle:')!!}
  {!!Form::textarea('detalle')!!}
</div>
</div>
