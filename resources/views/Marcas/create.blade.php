@extends('welcome')
@section('layout')
{!! Form::open(['route'=>'marcas.store','methoh'=>'POST'])!!}

{!!Form::close()!!}
@stop
