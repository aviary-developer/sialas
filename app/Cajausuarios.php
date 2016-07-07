<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cajausuarios extends Model
{
    protected $fillable = ['caja_id','planilla_id','monto','detalle','cantidad'];

    public static function nombreUsuario($id){
      $u= User::find($id);
      return $u->nom_usuario;
    }
}
