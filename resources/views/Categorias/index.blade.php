@extends ('welcome')
@section ('layout')
<div class="launcher">
  <div class="lfloat"></div>
  <a href="#">Link 1</a>
</div>
<div class="panel">
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
</div>
@stop
