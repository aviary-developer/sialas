<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Pagoservicios extends Model
{
    protected $fillable = ['caja_id','servicio_id','monto','detalle'];

    public static function nombreCaja($id){
      $n= Cajas::find($id);
      return $n->nombre;
    }
    public static function nombreBanco($id){
      $n= Bancos::find($id);
      return $n->nombre;
    }
}
