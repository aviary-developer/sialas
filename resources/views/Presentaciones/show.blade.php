@extends('welcome')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
  @endif
  <div class="launcher">
    <div class="lfloat"></div>
    <div class="tooltip">
      <a href='#'>
        <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Atras</span>
    </div>
    <div class="tooltip">
      <a href={!! asset('/presentaciones/crear/'.$producto) !!}>
        <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
      </a>
      <span class="tooltiptext">Nuevo</span>
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
      <h2>Presentaciones</h2>
      <h3 id='txt'> |{{ $nombre }}</h3>
      <div class="sep"></div>
    </div>
    <center>
      <table>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Equivalencia</th>
          <th>Ganancia</th>
          <th>Acciones</th>
        </tr>
        <?php $a = 1; ?>
        @foreach($presentacion as $c)
          <tr>
            <td>{{$a}}</td>
            <td>{{$c->nombre}}</td>
            <td><center>{{$c->equivale}}</center></td>
            <td><center>{{'$ '.$c->ganancia}}</center></td>
            <td>
              <div class="up">
                <img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
                <div class="image">
                  <div class="tooltip">
                    <a href={!! asset('/presentaciones/'.$c->id.'/edit') !!}>
                      <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
                    </a>
                    <span class="tooltiptextup">Editar</span>
                  </div>
                  <div class="tooltip">
                    @include('Categorias.Formularios.darDeBaja')
                    <span class="tooltiptextup">Papelera</span>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php $a++; ?>
        @endforeach
      </table>
      <div id="act">
        {!! str_replace ('/?', '?', $presentacion) !!}
      </div>
    </center>
  </div>

@stop
