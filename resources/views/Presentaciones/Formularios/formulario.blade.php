{!! Form::label('lNombre','Nombre:') !!}
{!!Form::text('nombre',null,['placeholder'=>'Nombre de la presentación'])!!}
{!! Form::label('lEquivale','Equivalencia:') !!}
{!!Form::input('number','equivale',null,['placeholder'=>'Equivalencia de la presentación','min'=>'1'])!!}
{!! Form::label('lPrecio','Ganancia:') !!}
{!!Form::input('number','ganancia',null,['placeholder'=>'Valor de ganancia por venta','min'=>'0.0','step'=>'0.1'])!!}
