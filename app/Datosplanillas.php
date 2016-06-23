<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Datosplanillas extends Model
{
  protected $table ='datosplanillas';

  protected $fillable = ['id','planilla_id','user_id','salario_neto','valor_renta'];
}
