<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
  protected $fillable = ['producto_id', 'usuario_id','entrega'];

  public static function buscar($estado){
    return Ventas::estado($estado)->orderBy('created_at','desc')->paginate(8);
  }

  public function scopeEstado($query, $entrega){
    if($entrega == null){
      $entrega = 0;
    }
    $query->where('entrega', $entrega);
  }
  public static function nombreProducto($id){
      $n= Productos::find($id);
      return $n->nombre;
    }
  public static function nombreUsuario($id){
        $n= User::find($id);
        return $n->name;
      }
}
