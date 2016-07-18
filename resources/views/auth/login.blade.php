@extends('base')
@section('layout')
  @if(Session::has('mensaje'))
    <?php $men=Session::get('mensaje');
    echo "<script>swal('$men', 'Click al botón', 'success')</script>";?>
  @endif
  @if(Session::has('error'))
    <?php $men=Session::get('error');
    echo "<script>swal('$men', 'Click al botón', 'error')</script>";?>
  @endif
<div class="panel">
<div class="enc">
  <h2>Ingreso</h2>
  <h3 id="txt">|Usuario</h3>
</div>
  {!!Form::open(['route'=>'login.store','method'=>'POST'])!!}
    {!!Form::label('LnombreUsuario','Nombre de Usuario:')!!}
    {!!Form::text('name',null,['placeholder'=>'Nombre de usuario'])!!}

    {!!Form::label('Lcontraseña','Contraseña:')!!}
    {!!Form::password('password',null,['placeholder'=>'Contraseña'])!!}
    {!!link_to('pass', $title = '¿Olvidó su contraseña?')!!}
{!!Form::submit('Ingresar')!!}
</div>
@stop
