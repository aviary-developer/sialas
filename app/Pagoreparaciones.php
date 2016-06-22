<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Pagoreparaciones extends Model
{
    //
    protected $fillable = ['caja_id','reparacion_id','monto','detalle','banco_id'];
}
