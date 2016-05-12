<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Presentaciones extends Model
{
    //
    protected $fillable = ['nombre','producto_id','equivale'];

    public static function nombreProducto($id){
      $n = Productos::find($id);
      return $n->nombre;
    }
}
