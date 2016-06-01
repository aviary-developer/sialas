<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    //
    protected $fillable = ['nombre','codigo','descripcion'];

    public static function buscar($nombre){//FALTA ESTADO
      return Tipos::nombre($nombre)->orderBy('nombre')->paginate(8);
    }

    public function scopeNombre($query, $nombre){
      if (trim($nombre)!="") {
        $query->where('nombre','LIKE','%'.$nombre.'%');
      }
    }

 }
