@extends('welcome')
@section('layout')

<div class="panel">
<div class="enc">
    <h2>Catálogo</h2>
    <h3 id='txt'> |Cuentas</h3>
  </div>
  <div>
@foreach($cuentas as $c)
	{{$c->codigo}}&nbsp;
	{{$c->cuenta}}<br>
@endforeach
</div>
</div>
@stop
