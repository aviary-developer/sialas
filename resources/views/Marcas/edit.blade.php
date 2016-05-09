
@extends ('welcome')
@section ('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href={!! asset('/marcas') !!}>
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
      <h2>Marcas</h2>
    </div>
    {!! Form::model($marcas,['route'=>['marcas.update',$marcas->id],'method'=>'PUT']) !!}
  @include('Marcas.Formularios.formularios')
  {!! Form::submit('Actualizar') !!}
  {!!Form::close()!!}
  </div>
@stop