@extends('welcome')
@section('layout')
  <div class="launcher">
      <div class="lfloat"></div>
      <div class="tooltip">
        <a href={!! asset('/cajausuarios') !!}>
          <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
        </a>
        <span class="tooltiptext">Atras</span>
      </div>
      <div class="tooltip">
        <a href="#">
          <img src={!! asset('/img/WB/ayu.svg') !!} alt="" class="circ"/>
        </a>
        <span class="tooltiptext">Ayuda</span>
      </div>
    </div>
    <div class="panel">
      <div class="enc">
        <h2>Planilla</h2>
        <h3 id='txt'> |Pago</h3>
      </div>
      {!! Form::model($planilla, ['route'=> ['cajausuarios.update', $planilla->id],'method'=>'PUT']) !!}
      @include('cajausuarios.Formularios.formulario')
      {!! Form:: submit('Guardar') !!}
      {!! Form::close() !!}
    </div>
@stop
