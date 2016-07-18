<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;
use DB;
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
    $egreso_planilla = Cajausuarios::where('caja_id',$id)->sum('cantidad');
    return $egreso_servicio + $egreso_mobiliario + $egreso_prestamo + $egreso_compra + $egreso_reparacion + $egreso_remesa + $egreso_transferencia + $egreso_planilla;
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

  public static function egresos(){
    $lista_servicio = Pagoservicios::
    select(DB::raw('created_at, sum(monto) as total'))
    ->orderBy('created_at')
    ->groupBy('created_at')->get();
    $lista_mobiliario = Pagos::
    select(DB::raw('created_at, sum(monto) as total'))
    ->orderBy('created_at')
    ->groupBy('created_at')->get();
    $lista_prestamo = Pagosprestamos::
    select(DB::raw('created_at, sum(monto) as total'))
    ->orderBy('created_at')
    ->groupBy('created_at')->get();
    $lista_compras = Pagocompras::
    select(DB::raw('created_at, sum(monto) as total'))
    ->orderBy('created_at')
    ->groupBy('created_at')->get();
    $lista_reparacion = Pagoreparaciones::
    select(DB::raw('created_at, sum(monto) as total'))
    ->orderBy('created_at')
    ->groupBy('created_at')->get();
    $lista_planilla = Cajausuarios::
    select(DB::raw('created_at, sum(cantidad) as total'))
    ->orderBy('created_at')
    ->groupBy('created_at')->get();

    $i = 0;
    foreach ($lista_servicio as $es) {
      $union[$i]['fecha'] = $es->created_at->format('Y-m-d');
      $union[$i]['servicio'] = $es->total;
      $union[$i]['mobiliario'] = 0;
      $union[$i]['compra'] = 0;
      $union[$i]['prestamo'] = 0;
      $union[$i]['reparacion'] = 0;
      $union[$i]['planilla'] = 0;
      $i++;
    }
    foreach ($lista_mobiliario as $es) {
      $union[$i]['fecha'] = $es->created_at->format('Y-m-d');
      $union[$i]['servicio'] = 0;
      $union[$i]['mobiliario'] = $es->total;
      $union[$i]['compra'] = 0;
      $union[$i]['prestamo'] = 0;
      $union[$i]['reparacion'] = 0;
      $union[$i]['planilla'] = 0;
      $i++;
    }
    foreach ($lista_compras as $es) {
      $union[$i]['fecha'] = $es->created_at->format('Y-m-d');
      $union[$i]['servicio'] = 0;
      $union[$i]['mobiliario'] = 0;
      $union[$i]['compra'] = $es->total;
      $union[$i]['prestamo'] = 0;
      $union[$i]['reparacion'] = 0;
      $union[$i]['planilla'] = 0;
      $i++;
    }
    foreach ($lista_reparacion as $es) {
      $union[$i]['fecha'] = $es->created_at->format('Y-m-d');
      $union[$i]['servicio'] = 0;
      $union[$i]['mobiliario'] = 0;
      $union[$i]['compra'] = 0;
      $union[$i]['prestamo'] = 0;
      $union[$i]['reparacion'] = $es->total;
      $union[$i]['planilla'] = 0;
      $i++;
    }
    foreach ($lista_prestamo as $es) {
      $union[$i]['fecha'] = $es->created_at->format('Y-m-d');
      $union[$i]['servicio'] = 0;
      $union[$i]['mobiliario'] = 0;
      $union[$i]['compra'] = 0;
      $union[$i]['prestamo'] = $es->total;
      $union[$i]['reparacion'] = 0;
      $union[$i]['planilla'] = 0;
      $i++;
    }
    foreach ($lista_planilla as $es) {
      $union[$i]['fecha'] = $es->created_at->format('Y-m-d');
      $union[$i]['servicio'] = 0;
      $union[$i]['mobiliario'] = 0;
      $union[$i]['compra'] = 0;
      $union[$i]['prestamo'] = 0;
      $union[$i]['reparacion'] = 0;
      $union[$i]['planilla'] = $es->total;
      $i++;
    }

    return $union;
  }

  public static function stock($id){
    $compra = Detallecompras::where('producto_id',$id)->where('entrega',false)->get();
    $total = 0;
    foreach ($compra as $cp) {
      $total += Cajas::conversion_basica($cp->presentacion_id,$cp->cantidad);
    }
    $r = Cajas::conversion_maxima($id,$total);
    return $r;
  }

  public static function conversion_basica($id,$cantidad){
    $equivale = Presentaciones::find($id);
    return $cantidad * $equivale->equivale;
  }

  public static function conversion_maxima($id, $cantidad){
    $equivale = Presentaciones::where('producto_id',$id)->orderBy('equivale','desc')->first();
    return $cantidad / $equivale->equivale;
  }
}
