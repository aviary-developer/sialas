@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
  <?php $men=Session::get('mensaje');
  echo "<script>swal('$men', 'Click al botón!', 'success')</script>";?>
@endif
<div class="panel">
<div class="enc">
    <h2>Catálogo</h2>
    <h3 id='txt'> |Cuentas</h3>
  </div>
  <div>
@foreach($cuentas as $c)
<?php  $letras=strlen($c->codigo);?>
@if($letras==1)
	<br>
@endif
@for($i=0;$i<$letras*2;$i++)
	&nbsp;
@endfor
	<div class="up">
              <img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
              <div class="image">
                <div class="tooltip">
                  <a href={!! asset('/cuentas/'.$c->id.'/edit') !!}>
                    <img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
                  </a>
                  <span class="tooltiptextup">Editar</span>
                </div>
              </div>
            </div>
	{{$c->codigo}}&nbsp;
	{{$c->cuenta}}<br>
@endforeach
</div>
</div>
@stop
