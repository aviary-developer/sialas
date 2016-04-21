@extends ('welcome')
@section ('layout')
  {!!Form::open(['route'=>'categorias.store','methoh'=>'POST'])!!}
  @include('Categorias.Formularios.formulario')
  {!! Form::submit('Guardar') !!}
  {!!Form::close()!!}
@stop
