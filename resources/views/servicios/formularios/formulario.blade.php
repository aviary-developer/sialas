{!!Form::label('lnombre','Tipo de servicio:')!!}
{!!Form::text('nombre',null,['placeholder'=>'Servicio'])!!}

{!!Form::label('lproveedor','Proveedor:')!!}	
{!!Form::text('proveedor',null,['placeholder'=>'Proveedor'])!!}	

{!!Form::label('lrecibo','Número de factura:')!!}	
{!!Form::text('n_recibo',null,['placeholder'=>'Recibo'])!!}

{!! Form::hidden('estado', 'true') !!}