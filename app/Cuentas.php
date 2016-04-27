<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
  protected $table ='cuentas';

  protected $fillable = ['codigo','cuenta','saldo','tipo_saldo','depende_de'];
}
