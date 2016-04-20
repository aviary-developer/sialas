@extends('welcome')
@section('layout')
<table>
<th>Nombre</th>
@foreach($usuario as $u)
<tr> 
<td>{{$u->password}} </td>
<td> {{$u->name}} </td>
</tr>
@endforeach
</table>
@stop