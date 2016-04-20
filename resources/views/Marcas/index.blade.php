@extends('welcome')
@section('layout')
<table>
<tr>
	<th>Id</th>
	<th>Nombre</th>
</tr>
@foreach($marcas as $marca)
<tr>

<td>{{$marca->id}}</td>
<td>{{$marca->nombre}}</td>

</tr>
@endforeach
</table>
@stop

