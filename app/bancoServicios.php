<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Bancoservicios extends Model
{
    //
    protected $fillable = ['nombre'];

    public static function buscar($nombre){//FALTA ESTADO
      return Bancoservicios::nombre($nombre)->orderBy('nombre')->paginate(8);
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