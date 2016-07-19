      
 <?php $pago=array("Mensual","Quincenal","Semanal") ?>   

<table>
        
        <tr>
          <th>Id</th>
          <th>Tramo</th>
          <th>Desde</th>
          <th>Hasta</th>
          <th>% a aplicar</th>
          <th>Sobre el exceso</th>
          <th>Mas cuota fija</th>
        </tr>
 <?php $a = 1; ?>
       @foreach($renta as $r)
<tr>
          <td>{{$renta->id}}</td>
          <td>{{$pago[1]}}</td>
          <td>{{$renta->desde}}</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php $a++; ?>
@endforeach
    
      </table>
