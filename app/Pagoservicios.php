<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Pagoservicios extends Model
{
    protected $fillable = ['caja_id','mobiliario_id','monto','detalle'];
}
