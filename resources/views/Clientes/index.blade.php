@extends ('welcome')
@section ('layout')
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
    <a href={!! asset('/clientes/create') !!}>
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
  </div>
   <div class="tooltip">
    <a href="#">
      <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ" onclick="activo('block','none','tt','im')"/>
    </a>
    <span class="tooltiptext" id="tt">Papelera</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Reporte</span>
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
    <h2>Clientes</h2>
    <h3 id='txt'> |Activos</h3>
  </div>
  <center>
    <table id="block">
      <tr>
        <th>
          Id
        </th>
        <th>
          Nombre
        </th>
        <th>
          Acciones
        </th>
      </tr>
      @foreach($clientesActivos as $c)
        <tr>
          <td>
            {{$c->id}}
          </td>
          <td>
            {{$c->nombre}}
          </td>
          <td>
            <div class="up">
              <img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
              <div class="image">
                <div class="tooltip">
                  <a href={!! asset('/clientes/'.$c->id.'/edit') !!}>
                    <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Editar</span>
                </div>
                <div class="tooltip">
                    @include('Clientes.Formularios.darDeBaja')
                  <span class="tooltiptextup">Papelera</span>
                </div>
                <div class="tooltip">
                  <a href={!! asset('/clientes/') !!}>
                    <img src={!! asset('/img/WB/ver.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Ver</span>
                </div>
              </div>
            </div>
          </td>
        </tr>
      @endforeach
    </table>
    <table id="none">
      <tr>
        <th>
          Id
        </th>
        <th>
          Nombre
        </th>
        <th>
          Acciones
        </th>
      </tr>
           <?php $a = 1; ?>
      @foreach($clientesInactivos as $c)
        <tr>
          <td>
            {{$a}}
          </td>
          <td>
            {{$c->nombre}}
          </td>
          
<td>
            <div class="up">
              <img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
              <div class="image">
                <div class="tooltip">
                  <a href={!! asset('/clientes/'.$c->id.'/edit') !!}>
                    <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Editar</span>
                </div>
                <div class="tooltip">
                    @include('Clientes.Formularios.darDeAlta')
                  <span class="tooltiptextup">Activar</span>
                </div>
                <div class="tooltip">
                  <a href={!! asset('/clientes/'.$c->id) !!}>
                    <img src={!! asset('/img/WB/ver.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Ver</span>
                </div>
              </div>

            </div>
          </td>
        </tr>
        <?php $a++; ?>
      @endforeach
    </table>
  </center>
</div>
@stop
