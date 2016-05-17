{!!Form::open(['route'=>'login.store','method'=>'POST'])!!}
    {!!Form::label('LnombreUsuario','Nombre de Usuario:')!!}
    {!!Form::text('name',null,['placeholder'=>'Nombre de usuario'])!!}

    {!!Form::label('Lcontraseña','Contraseña:')!!}
    {!!Form::password('password',null,['placeholder'=>'Contraseña'])!!}
{!!Form::submit('Ingresar')!!}   