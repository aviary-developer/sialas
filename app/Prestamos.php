<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $fillable = ['banco_id','caja_id','monto','interes','num_cuotas','val_cuotas','cuenta','dia_pago','desposito','banconombre','garantia'];

    public static function nombreCaja($id){
      if($id != null){
        $n= Cajas::find($id);
        return $n->nombre;
      }else{
        return 'ninguno';
      }
    }

    public static function nombreBanco($id){
      $n= Bancos::find($id);
      return $n->nombre;
    }

}
