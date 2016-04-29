<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
    protected $fillable = ['nombre'];

    public function scopeNombre($query, $nombre){
      if (trim($nombre)!="") {
        $query->where('nombre',$nombre);
      }
    }
}
