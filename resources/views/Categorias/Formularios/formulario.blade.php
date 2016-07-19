<div class="alerta-errores">
			@foreach ($errors->get('nombre') as $error)
				<br>{{$error}}
			@endforeach
		</div>
{!! Form::label('lNombre','Nombre:') !!}
{!!Form::text('nombre',null,['placeholder'=>'Nombre de la categoria'])!!}
