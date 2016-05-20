{!! Form::label('lNombre','Nombre:') !!}
{!!Form::text('nombre',null,['placeholder'=>'Nombre de la presentación'])!!}
<div class="fila">
  <div>
    {!! Form::label('lEquivale','Equivalencia:') !!}
    {!!Form::input('number','equivale',null,['placeholder'=>'Unidades','min'=>'1'])!!}
  </div>
  <div>
    {!! Form::label('lPrecio','Ganancia ($):') !!}
    {!!Form::number('ganancia',null,['placeholder'=>'Ganancia por venta','min'=>'0.0','step'=>'0.01'])!!}
  </div>
</div>
