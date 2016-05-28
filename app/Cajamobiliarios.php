<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cajamobiliarios extends Model
{
    //
    protected $fillable = ['caja_id','mobiliario_id','cantidad','detalle'];


  public static function nombreCajas($id){
      $n= Cajas::find($id);
      return $n->nombre; 
    }
     public static function nombreMobiliarios($id){
      $n= Mobiliarios::find($id);
      return $n->nombre; 
    }

}
