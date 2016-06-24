<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class mobiliarios extends Model
{
    //
    protected $fillable= ['nombre','codigo','fecha','precio','descripcion','estado','nuevo','anios','proveedor_id','tipo_id','credito','intereses','num_cuotas','val_cuotas','tiempo_pago','cuenta','dia_pago'];


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
}
