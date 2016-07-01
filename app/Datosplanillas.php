<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Datosplanillas extends Model
{
  protected $table ='datosplanillas';

  protected $fillable = ['id','planilla_id','user_id','salario_neto','valor_renta'];

  public static function sumaDescuentos($id){
    $acum=0;
    $vp=Valoresplanillas::where('dato_id',$id)->get();
    foreach ($vp as $p) {
      $dp=Descuentoaportes::find($p->desp_id);
      if($dp->tipo=='Descuento'){
        $acum=$acum+$p->monto;
      }
    }
    return $acum;
  }
  public static function montos($id){
    $valores=Valoresplanillas::where('dato_id',$id)->get();
    return $valores;
  }
}
