<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cajaservicios extends Model
{
    protected $fillable = ['caja_id','servicio_id','monto','detalle'];	

    public static function nombreCajas($id){
      $n= Cajas::find($id);
      return $n->nombre; 
    }
     public static function nombreServicios($id){
      $n= Servicios::find($id);
      return $n->nombre; 
    }
}
