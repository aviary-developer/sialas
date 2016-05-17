<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Detallecompras extends Model
{
  protected $fillable = ['compra_id', 'producto_id','presentacion_id','cantidad'
                         ,'precio','fecha_caducidad','entrega'];
}
