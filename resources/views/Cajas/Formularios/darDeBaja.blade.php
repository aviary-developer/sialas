{!!Form::open(['route'=>['cajas.destroy',$caja->id],'method'=>'DELETE'])!!}
<img src={!! asset('/img/WB/del.svg') !!} alt="" class="circ" onclick="msj()"/>
{!!Form::close()!!}
