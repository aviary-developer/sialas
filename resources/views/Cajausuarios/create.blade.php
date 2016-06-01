@extends('welcome')
@section('layout')

  <div class="panel">
    <div class="enc">
      <h2>Planilla</h2>
        <h3 id='txt'> |Usuarios</h3>
    </div>
<center>
    @foreach($usuarios as $u)
      <table>
        <tr>
          <th>Usuario</th>
          <th>Salario</th>
          <th>AFP</th>
        </tr>
        <tr>
          <td>{{$u->nom_usuario}}</td>
          <td>{{$u->salario}}</td>
        </tr>
      </table>
    @endforeach
</center>
</div>
@stop
