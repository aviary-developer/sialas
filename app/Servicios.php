<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table ='servicios';

    protected $fillable = ['nombre','proveedor','n_recibo','estado'];

    public static function buscar($nombre,$estado){
      return Servicios::nombre($nombre)->estado($estado)->orderBy('nombre')->paginate(8);
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
