<div class="alerta-errores">
			@foreach ($errors->get('nombre') as $error)
				<br>{{$error}}
			@endforeach
		</div>
{!!Form::label('LNombre','Nombre:')!!}
{!!Form::text('nombre',null,['placeholder'=>'Ingrese el nombre de la Marca'])!!}
