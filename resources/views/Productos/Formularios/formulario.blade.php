<?php 
if($bandera==1){
	$valorc=null;
	$valorm=null;
}else{
	$valorc=$productos->categoria_id;
	$valorm=$productos->marca_id;
}
 ?>
{!!Form::label('lnombre','Nombre:')!!}
{!!Form::text('nombre',null,['placeholder'=>'Nombre del producto'])!!}

{!!Form::label('lmarca','Marca:')!!}	
<select name="marca_id">
	@foreach($m as $marcas)
	@if($valorm==$marcas->id && $valorm!=null)
		<option value="{{$marcas->id}}" selected="selected">{{$marcas->nombre}}</option>
	@else
	<option value="{{$marcas->id}}">{{$marcas->nombre}}</option>
	@endif
	@endforeach
</select>	

{!!Form::label('lcategoria','Categoria:')!!}	
<select name="categoria_id">
	@foreach($c as $cate)
	@if($valorc==$cate->id && $valorc!=null)
		<option value="{{$cate->id}}" selected="selected">{{$cate->nombre}}</option>
	@else
	<option value="{{$cate->id}}">{{$cate->nombre}}</option>
	@endif
	@endforeach
</select>

{!!Form::label('limagen','Imagen:')!!}	
{!!Form::file('nombre_img')!!}