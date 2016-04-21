<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $fillable = ['nombre', 'apellido', 'dui','nit','direccion','correo','telefono'];
}
