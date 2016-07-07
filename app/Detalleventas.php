<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Detalleventas extends Model
{
  protected $fillable=['venta_id', 'producto_id','presentacion_id','cantidad'
  ,'precio'];

  public static function nombreProducto($id){
    $n= Productos::find($id);
    return $n->nombre;
  }
  public static function nombrePresentacion($id){
    $n= Presentaciones::find($id);
    return $n->nombre;
  }
}
