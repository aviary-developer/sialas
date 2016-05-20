<div class="fila">
  <div>
    {!!Form::label('LNombre','Nombre de Banco:')!!}
    {!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre banco...','focusable'])!!}
    {!!Form::label('LRepresentante','Representante de Cuenta Bancaria:')!!}
    {!!Form::text('representante',null,['placeholder'=>'Ingrese la ubicación'])!!}
  </div>
  <div>
    {!!Form::label('LNumero','Número de Cuenta:')!!}
    {!!Form::text('numero',null,['placeholder'=>'Ingrese numero de cuenta bancaria','focusable'])!!}
  </div>
</div>
