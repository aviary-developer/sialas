<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
  //
    protected $fillable = ['nombre', 'ubicacion'];

    public static function buscar($nombre,$estado){
      return Cajas::nombre($nombre)->estado($estado)->orderBy('nombre')->paginate(8);
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

    public static function ingreso_caja($id){
      $ingreso_prestamo = Prestamos::where('caja_id',$id)->sum('monto');
      $ingreso_venta = 0;
      $ingreso_retiro = Remesas::where('caja_id',$id)->where('transaccion',false)->sum('monto');
      $ingreso_transferencia = Transferencias::where('caja_id',$id)->sum('monto');
      return $ingreso_prestamo + $ingreso_venta + $ingreso_retiro + $ingreso_transferencia;
    }

    public static function egreso_caja($id){
      $egreso_servicio = Pagoservicios::where('caja_id',$id)->sum('monto');
      $egreso_mobiliario = Pagos::where('caja_id',$id)->sum('monto');
      $egreso_prestamo = Pagosprestamos::where('caja_id',$id)->sum('monto');
      $egreso_compra = Pagocompras::where('caja_id',$id)->sum('monto');
      $egreso_reparacion = Pagoreparaciones::where('caja_id',$id)->sum('monto');
      $egreso_remesa = Remesas::where('caja_id',$id)->where('transaccion',true)->sum('monto');
      $egreso_transferencia = Transferencias::where('cajita',$id)->sum('monto');
      return $egreso_servicio + $egreso_mobiliario + $egreso_prestamo + $egreso_compra + $egreso_reparacion + $egreso_remesa + $egreso_transferencia;
    }

    public static function ingreso_banco($id){
      $ingreso_prestamo = Prestamos::where('banco_id',$id)->sum('monto');
      $ingreso_venta = 0;
      $ingreso_retiro = Remesas::where('banco_id',$id)->where('transaccion',true)->sum('monto');
      return $ingreso_prestamo + $ingreso_venta + $ingreso_retiro;
    }

    public static function egreso_banco($id){
      $egreso_servicio = Pagoservicios::where('banco_id',$id)->sum('monto');
      $egreso_mobiliario = Pagos::where('banco_id',$id)->sum('monto');
      $egreso_prestamo = Pagosprestamos::where('banco_id',$id)->sum('monto');
      $egreso_compra = Pagocompras::where('banco_id',$id)->sum('monto');
      $egreso_reparacion = Pagoreparaciones::where('banco_id',$id)->sum('monto');
      $egreso_remesa = Remesas::where('banco_id',$id)->where('transaccion',false)->sum('monto');
      return $egreso_servicio + $egreso_mobiliario + $egreso_prestamo + $egreso_compra + $egreso_reparacion + $egreso_remesa;
    }
}
