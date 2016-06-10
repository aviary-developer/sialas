<div class="fila">
  <div>
    {!!Form::label('LNombre','Nombre de Banco:')!!}
    {!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre banco','focusable'])!!}
    {!!Form::label('LRepresentante','Representante de Cuenta:')!!}
    {!!Form::text('representante',null,['placeholder'=>'Nombre del representante'])!!}
  </div>
  <div>
    {!!Form::label('LNumero','Número de Cuenta:')!!}
    {!!Form::text('numero',null,['placeholder'=>'Ingrese número de cuenta','focusable'])!!}
  </div>
</div>
