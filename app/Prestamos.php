<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $fillable = ['banco_id','caja_id','monto','interes','num_cuotas','val_cuotas','cuenta','dia_pago','desposito','banconombre','garantia'];
}
