@extends ('welcome')
@section ('layout')
<table>
  <tr>
    <th>
      Id
    </th>
    <th>
      Nombre
    </th>
  </tr>
    @foreach($categoria as $c)
    <tr>
      <td>
        {{$c->id}}
      </td>
      <td>
        {{$c->nombre}}
      </td>
    </tr>
    @endforeach
</table>
@stop
