{!!Form::label('lnombre','Nombre:')!!}
{!!Form::text('nombre',null,['placeholder'=>'Nombre del producto'])!!}

{!!Form::label('lmarca','Marca:')!!}	
<select name="marca_id">
	@foreach($m as $marcas)
	<option value="{{$marcas->id}}">{{$marcas->nombre}}</option>
	@endforeach
</select>	

{!!Form::label('lcategoria','Categoria:')!!}	
<select name="categoria_id">
	@foreach($c as $cate)
	<option value="{{$cate->id}}">{{$cate->nombre}}</option>
	@endforeach
</select>
{!!Form::label('limagen','Imagen:')!!}	
{!!Form::file('nombre_img')!!}