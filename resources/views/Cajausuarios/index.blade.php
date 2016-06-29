@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <?php $cam = 0; ?>
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href="servicios/create">
        <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext" id="tt">Nuevo</span>
    </div>
    <div class="tooltip">
      <a href="#">
        @if(!$cam)
          <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
        @else
          <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
        @endif
      </a>
      @if(!$cam)
        <span class="tooltiptext" id="tt">Papelera</span>
      @else
        <span class="tooltiptext" id="tt">Activos</span>
      @endif
    </div>
    <div class="tooltip">
      <a href="#">
        <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext" id="tt">Reporte</span>
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
      <h2>Planillas</h2>
        <h3 id='txt'> |Elaboradas</h3>
            <div class="sep"></div>
      {!!Form::open(['route'=>'cajausuarios.index','method'=>'GET','role'=>'search','class'=>'search'])!!}
      {!! Form::date('fecha',null,['placeholder'=>'Fecha de creación']) !!}
      {!! Form::submit('Buscar') !!}
      {!! Form::close() !!}
    </div>
    <center>
      <table>
        <tr>
          <th>#</th>
          <th>Fecha</th>
          <th>Total</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
        <?php $c=1; ?>
        @foreach($planillas as $p)
        <tr>
          <td>{{$c}}</td>
          <td>{{date("d-m-Y",strtotime($p->fecha))}}</td>
          <td>{{number_format($p->totalplanilla($p->id), 2,'.','')}}</td>
          <td></td>
        </tr>
        @endforeach
      </table>
      <div id="act">
        {!! str_replace ('/?', '?', $planillas->render()) !!}
      </div>
    </center>
  </div>
@stop
