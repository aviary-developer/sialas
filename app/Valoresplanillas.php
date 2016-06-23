<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Valoresplanillas extends Model
{
  protected $table ='valoresplanillas';

  protected $fillable = ['id','dato_id','desp_id','monto'];
}
