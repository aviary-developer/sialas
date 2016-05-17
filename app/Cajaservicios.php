<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cajaservicios extends Model
{
    protected $fillable =['caja_id','servicio_id','monto','detalle'];
}
