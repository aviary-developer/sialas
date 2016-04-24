@extends ('welcome')
@section ('layout')
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Nuevo</span>
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/general/circ.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Ayuda</span>
    </div>
  </div>
  <div class="panel">
    <div class="enc">
      <h2>Categorias</h2>
    </div>
    {!!Form::open(['route'=>'categorias.store','methoh'=>'POST'])!!}
    @include('Categorias.Formularios.formulario')
    {!! Form::submit('Guardar') !!}
    {!!Form::close()!!}
  </div>
@stop
