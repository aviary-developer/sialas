<?php
if($bandera==1){
	$v=null;
  $m=null;
}else{
	$v = $Transferencias->cajita;
  $m=$Transferencias->caja_id;

}
?>
<div class="fila">
  <div>
	{!!Form::label('Lfecha','Fecha de Transferencia:')!!}
	{!!Form::date('fecha_transferencia',null,['placeholder'=>'Escriba fecha :'])!!}
  </div>
</div>

<div class="fila">
  <div>
    {!!Form::label('lcajita','Caja Emisora:')!!}
    <select name="cajita">
      @foreach($c as $caja)
        @if($v==$caja->id && $v!=null)
          <option value="{{$caja->id}}" selected="selected">{{$caja->nombre}}</option>
        @else
          <option value="{{$caja->id}}">{{$caja->nombre}}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div>
    {!!Form::label('lcajaid','Caja Destino:')!!}
    <select name="caja_id">
      @foreach($c as $caja)
        @if($m==$caja->id && $m!=null)
          <option value="{{$caja->id}}" selected="selected">{{$caja->nombre}}</option>
        @else
          <option value="{{$caja->id}}">{{$caja->nombre}}</option>
        @endif
      @endforeach
    </select>
  </div>
</div>

<div class="fila">
  <div>
	{!!Form::label('Lmonto','Monto a Transferir:')!!}
	{!!Form::text('monto',null,['placeholder'=>'$ 00.00'])!!}
</div>
<div>
  {!!Form::label('Ldetalle','Detalle de la salida:')!!}
	{!!Form::textarea('detalle',null,['placeholder'=>'Describa el motivo','rows'=>'4'])!!}
</div>
</div>
