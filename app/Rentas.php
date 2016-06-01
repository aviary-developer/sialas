<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Rentas extends Model
{
    protected $table ='rentas';

    protected $fillable = ['pago','tramo','desde','hasta','porcentaje','exceso','cuota'];
}
