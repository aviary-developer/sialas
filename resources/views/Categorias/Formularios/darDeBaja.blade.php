{!!Form::open(['route'=>['categorias.destroy',$c->id],'method'=>'DELETE'])!!}
<img src={!! asset('/img/WB/del.svg') !!} alt="" class="circ" onclick="msj()"/>
{!!Form::close()!!}
