@extends('welcome')
@section('layout')

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
	
	{{$c->codigo}}&nbsp;
	{{$c->cuenta}}<br>
@endforeach
</div>
</div>
@stop
