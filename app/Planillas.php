<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
  protected $table ='planillas';

  protected $fillable = ['id','fecha','estado_pagado'];

  public static function buscar($fecha){
    return Planillas::fecha($fecha)->orderBy('fecha')->paginate(8);
  }

  public static function scopeFecha($query,$fecha){
    if (trim($fecha)!="") {
      $query->where('fecha',$fecha);
    }
  }

  public static function totalplanilla($id){
    $total=0;
    $datosp=Datosplanillas::where('planilla_id',$id)->get();
    foreach ($datosp as $dp) {
      $total=$total+$dp->salario_neto+$dp->valor_renta;
      $valor=Valoresplanillas::where('dato_id',$dp->id)->get();
      foreach ($valor as $v) {
        $total=$total+$v->monto;
      }
    }
return $total;
  }
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
