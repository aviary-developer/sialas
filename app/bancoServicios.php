<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Bancoservicios extends Model
{
    protected $fillable = ['banco_id','servicio_id','monto','detalle'];  

    public static function nombreBancos($id){
      $n= Bancos::find($id);
      return $n->nombre; 
    }
     public static function nombreServicios($id){
      $n= Servicios::find($id);
      return $n->nombre; 
    }
}
