<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Detallecompras extends Model
{
  protected $fillable = ['compra_id', 'producto_id','presentacion_id','cantidad'
  ,'precio','fecha_caducidad','entrega'];

  public static function nombreProducto($id){
    $n= Productos::find($id);
    return $n->nombre;
  }
  public static function nombrePresentacion($id){
    $n= Presentaciones::find($id);
    return $n->nombre;
  }
  public static function nombreUbicacion($id){
    $n= Ubicaciones::find($id);
    return $n->nombre;
  }
}
