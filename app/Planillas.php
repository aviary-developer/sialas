<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
  protected $table ='planillas';

  protected $fillable = ['id','fecha','estado_pagado','tipo_salario'];

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
  public static function cantidad($id){
    $datosp=Datosplanillas::where('planilla_id',$id)->get();
    foreach ($datosp as $p) {
      $valor=Valoresplanillas::where('dato_id',$p->id)->get();
      return $valor;
    }
  }

  public static function nombre($id){
    $v=Descuentoaportes::find($id);
    return $v->nombre;
  }
  public static function totalPorDesp($p_id,$desp_id){
    $total=0;
    $dp=Datosplanillas::where('planilla_id',$p_id)->get();
    foreach ($dp as $d) {
      $vp=Valoresplanillas::where('dato_id',$d->id)->get();
      foreach ($vp as $v) {
        if($v->desp_id==$desp_id){
          $total=$total+$v->monto;
        }
      }
    }
    return $total;
  }
  public static function totalRenta($p_id){
    $total=0;
    $dp=Datosplanillas::where('planilla_id',$p_id)->get();
    foreach ($dp as $d) {
      $total=$total+$d->valor_renta;
    }
    return $total;
  }

  public static function totalSalarioNeto($p_id){
    $total=0;
    $dp=Datosplanillas::where('planilla_id',$p_id)->get();
    foreach ($dp as $d) {
      $total=$total+$d->salario_neto;
    }
    return $total;
  }

  public static function existe($fecha,$tipo){
    $cantidad=Planillas::fecha($fecha)->tipo_salario($tipo)->get();
    if(count($cantidad)>0){
      return false;
    }else{
      return true;
    }
  }
  public function scopeTipo_salario($query,$tipo){
    $query->where('tipo_salario', $tipo);
  }
}
