@extends('welcome')
@section('layout')

  <div class="panel">
    <div class="enc">
      <h2>Planilla</h2>
        <h3 id='txt'> |Empleados</h3>
    </div>
<center>
    @foreach($usuarios as $u)
      <table>
        <tr>
          <th>Empleado</th>
          <th>Salario</th>
          <th>Renta</th>
          <th>AFP</th>
          <th>ISSS</th>
          <th>AFP</th>
          <th>ISSS</th>
        </tr>
        <tr>
          <td>{{$u->nom_usuario}}</td>
          <td>{{number_format($u->salario, 2, '.', '')}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
    @endforeach
</center>
</div>
@stop
