<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table ='servicios';

    protected $fillable = ['nombre','proveedor','n_recibo','estado'];
}
