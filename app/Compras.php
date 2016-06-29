<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
  protected $fillable = ['proveedor_id', 'usuario_id','entrega'];

  public static function buscar($estado){
    return Compras::estado($estado)->orderBy('created_at','desc')->paginate(8);
  }

  /*public function scopeNombre($query, $nombre){
    if (trim($nombre)!="") {
      $query->where('nombre','LIKE','%'.$nombre.'%');
    }
  }*/

  public function scopeEstado($query, $entrega){
    if($entrega == null){
      $entrega = 1;
    }
    $query->where('entrega', $entrega);
  }
  public static function nombreProveedor($id){
      $n= Proveedores::find($id);
      return $n->nombre;
    }
  public static function nombreUsuario($id){
        $n= User::find($id);
        return $n->name;
      }
}
