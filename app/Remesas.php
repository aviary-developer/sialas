<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Remesas extends Model
{
    protected $fillable = ['caja_id', 'banco_id','transaccion','monto'];


      public static function nombreCajas($id){
      $n= Cajas::find($id);
      return $n->nombre;
    }

      public static function nombreBancos($id){
      $n= Bancos::find($id);
      return $n->nombre;
    }
}
