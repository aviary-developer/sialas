<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
  protected $table ='cuentas';

  protected $fillable = ['codigo','cuenta','tipo_saldo','depende_de','id'];
}
