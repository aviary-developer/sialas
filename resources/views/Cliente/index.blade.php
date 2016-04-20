@extends('welcome')
@section('layout')
<table>
	<th>nombre</th>
	@foreach($cliente as $c)
	<tr>
		<td>
			{{ $c->nombre}}
		</td>
	</tr>
	@endforeach
</table>
@stop


