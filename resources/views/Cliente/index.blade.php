@extends('welcome')
@section('layout')
<table>
	<th>nombre</th>
	@foreach($cliente as $c)
	<tr>
		<td>
			{{ $c->nombre}}
		</td>
		<td>
			
			{!! link_to_route("clientes.edit", $title = "Editar", $parameters=$c->id, $attributes=[]) !!}
		</td>
	</tr>
	@endforeach
</table>
@stop


