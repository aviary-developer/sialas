<div class="fila">
  <div>
    <div class="alerta-errores">
      @foreach ($errors->get('nombre') as $error)
        <br>{{$error}}
      @endforeach
    </div>
    {!!Form::label('LNombre','Nombre de Banco:')!!}
    {!!Form::text('nombre',null,['placeholder'=>'Ingrese nombre banco','focusable'])!!}
    <div class="alerta-errores">
      @foreach ($errors->get('representante') as $error)
        <br>{{$error}}
      @endforeach
    </div>
    {!!Form::label('LRepresentante','Representante de Cuenta:')!!}
    {!!Form::text('representante',null,['placeholder'=>'Nombre del representante'])!!}
  </div>
  <div>
   
   <div class="alerta-errores">
      @foreach ($errors->get('numero') as $error)
        <br>{{$error}}
      @endforeach
    </div>
    {!!Form::label('LNumero','Número de Cuenta:')!!}
    {!!Form::text('numero',null,['placeholder'=>'Ingrese número de cuenta','focusable'])!!}
  </div>
</div>
