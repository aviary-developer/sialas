<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Reparaciones extends Model
{
    //
    protected $fillable= ['proveedor_id','mobiliario_id','precio','fecha_deposito','diagnostico','fecha_entrega'];
    public static function nombreMobiliario($id){
      $n= Mobiliarios::find($id);
      return $n->nombre;
    }
}
