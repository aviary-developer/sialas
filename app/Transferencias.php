<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transferencias extends Model
{
    protected $fillable = ['fecha_transferencia','cajita','monto','caja_id','detalle'];
    protected $dates = ['fecha_transferencia'];
    public static function nombreCajas($id){
      $n= Cajas::find($id);
      return $n->nombre;
    }
}
