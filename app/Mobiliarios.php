<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class mobiliarios extends Model
{
  //
  protected $fillable= ['nombre','codigo','fecha','precio','descripcion','estado','nuevo','anios','proveedor_id','tipo_id','credito','intereses','num_cuotas','val_cuotas','tiempo_pago','cuenta','dia_pago'];
  protected $dates = ['fecha_compra'];

  public static function buscar($nombre,$estado)
  {
    return Mobiliarios::nombre($nombre)->estado($estado)->orderBy('nombre')->paginate(8);
  }

  public function scopeNombre($query,$nombre)
  {
    if(trim($nombre)!="")
    {
      $query->where('nombre','LIKE','%'.$nombre.'%');
    }
  }

  public function scopeEstado($query,$estado)
  {
    if($estado== null)
    {
      $estado=1;
    }
    $query->where('estado',$estado);
  }

  public static function nombreProveedor($id){
    $n= Proveedores::find($id);
    return $n->nombre;
  }
  public static function nombreTipos($id){
    $n= Tipos::find($id);
    return $n->nombre;
  }
  public static function codigoTipos($id){
    $n= Tipos::find($id);
    return $n->codigo;
  }
  public static function depreTipo($id){
    $n= Tipos::find($id);
    if($n->descripcion==0){
      $r = 20;
    }
    else if($n->descripcion==1){
      $r = 5;
    }
    elseif ($n->descripcion==2) {
      $r = 4;
    }
    else{
      $r = 2;
    }
    return $r;
  }
  public static function nombreCaja($id){
    $n= Cajas::find($id);
    return $n->nombre;
  }
  public static function nombreBanco($id){
    $n= Bancos::find($id);
    return $n->nombre;
  }
}
