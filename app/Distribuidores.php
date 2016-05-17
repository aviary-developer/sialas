<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Distribuidores extends Model
{
    //
    protected $fillable = ['nombre'];

    public static function buscar($nombre,$estado){
      return Distribuidores::nombre($nombre)->estado($estado)->orderBy('nombre')->paginate(8);
    }

    public function scopeNombre($query, $nombre){
      if (trim($nombre)!="") {
        $query->where('nombre','LIKE','%'.$nombre.'%');
      }
    }

    public function scopeEstado($query, $estado){
      if($estado == null){
        $estado = 1;
      }
      $query->where('estado', $estado);
    }

    
   
}
