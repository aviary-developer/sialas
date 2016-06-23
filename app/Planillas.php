<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
  protected $table ='planillas';

  protected $fillable = ['id','fecha'];

  public static function valorneto($descuentos,$valores){
    $sn=$valores[1];
    $sn=$sn-$valores[2];
    for ($b=3; $b < count($valores); $b++) {

      if(Planillas::tipo($descuentos[$b-3])){
        $sn=$sn-$valores[$b];
      }
    }
    return $sn;
  }

  public static function tipo($id){
    $tipo=Descuentoaportes::find($id);
    if($tipo->tipo=='Descuento')
    {return true;}else{return false;}
  }
}
