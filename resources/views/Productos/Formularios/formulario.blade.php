{!!Form::label('lnombre','Nombre:')!!}
{!!Form::text('nombre',null,['placeholder'=>'Nombre del producto'])!!}

{!!Form::label('lmarca','Marca:')!!}	
{!!Form::select('marca_id')!!}	

{!!Form::label('lcategoria','Categoria:')!!}	
{!!Form::select('categoria_id')!!}

{!!Form::label('limagen','Imagen:')!!}	
{!!Form::file('nombre_img')!!}