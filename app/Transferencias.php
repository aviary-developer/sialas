<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Transferencias extends Model
{
    protected $fillable = ['fecha_transferencia','cajita','monto','caja_id','detalle'];

    public static function nombreCajas($id){
      $n= Cajas::find($id);
      return $n->nombre;
    }
}
