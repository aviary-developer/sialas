<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Descuentoaportes extends Model
{
  protected $table ='descuentoaportes';

  protected $fillable = ['nombre','tipo','valor','techo','estado'];

  public static function buscar($nombre,$estado){
    return Descuentoaportes::nombre($nombre)->estado($estado)->orderBy('nombre')->paginate(8);
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
