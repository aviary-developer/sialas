<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
  protected $table ='planillas';

  protected $fillable = ['id','fecha'];
}
