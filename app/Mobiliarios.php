<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Mobiliarios extends Model
{
    //
    protected $fillable = ['nombre'];

    public function scopeNombre($query, $nombre){
      if (trim($nombre)!="") {
        $query->where('nombre',$nombre);
      }
    }
}