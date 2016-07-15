<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Descuentoaportes extends Model
{
  protected $table ='descuentoaportes';

  protected $fillable = ['nombre','tipo','valor','techo','estado'];

  public static function buscar($nombre,$estado){
    return Descuentoaportes::nombre($nombre)->estado($estado)->orderBy('nombre')->paginate(8);
  }
  public static function buscarv($nombre,$estado){
    return Descuentoaportes::nombre($nombre)->estado($estado)->orderBy('tipo','dsc')->get();
  }
  public function scopeNombre($query, $nombre){
    if (trim($nombre)!="") {
      $query->where('nombre','LIKE','%'.$nombre.'%');
    }
  }
  public function scopeEstado($query, $estado){
    if($estado == null){
      $estado = 1;
    }
    $query->where('estado', $estado);
  }

  public static function iniciandoDesp(){

    $contador=Descuentoaportes::count();

    if($contador<1){
      $nombre=array("AFP (Empleado)","ISSS (Empleado)","AFP (Patrono)","ISSS (Patrono)");
      $tipo=array("Descuento","Descuento","Aportación","Aportacón");
      $valor=array("6.25","3","6.75","7.5");
      $techo=array("6377.15","1000","6377.15","1000");
      for($i=0;$i<4;$i++){

        Descuentoaportes::create([
          'nombre' => $nombre[$i],
          'tipo' => $tipo[$i],
          'valor'=> $valor[$i],
          'techo' => $techo[$i],
        ]);
      }
    }
  }
}
