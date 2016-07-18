<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Cajas;
use sialas\Cajausuarios;
use sialas\Bancos;
use sialas\Prestamos;
use sialas\Productos;
use sialas\Presentaciones;
use sialas\Detallecompras;
use sialas\Pagoservicios;
use sialas\Pagos;
use sialas\Transferencias;
use sialas\Pagoreparaciones;
use sialas\Pagosprestamos;
use sialas\Pagocompras;
use sialas\Remesas;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class CajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $state = $request->get('estado');
      $name = $request->get('nombre');
      $cajasActivas= Cajas::buscar($name,$state);
      return view('cajas.index',compact('cajasActivas','cajasInactivas','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cajas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cajas::create($request->All());
        return redirect('/cajas')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $caja = Cajas::find($id);
      //return view('Categorias.show',compact('categorias'));
      return View::make('Cajas.show')->with('caja', $caja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cajas=Cajas::find($id);
      return view('cajas.edit', compact('cajas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $cajas=Cajas::find($id);
      $cajas->fill($request->all());
      $cajas->save();
      Session::flash('mensaje','¡Registro Actualizado!');
      return Redirect::to('/cajas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cajas = Cajas::find($id);
         $cajas->estado=false;
         $cajas->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/cajas');
    }
    public function darAlta($id){
      $cajas = Cajas::find($id);
         $cajas->estado=true;
         $cajas->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/cajas');
    }
    //Función para mostrar las estadisticas
    protected static function cmp($a,$b) {
      return strtotime($a['fecha']) - strtotime($b['fecha']);
    }
    public function stats(){
      //Hoy y hace 3 días
      $hoy = Carbon::now();
      $dia3 = Carbon::now();
      $dia3 = $dia3->subDays(3);
      //Listar cajas
      $lista_caja = Cajas::orderBy('nombre')->get();
      //Listar bancos
      $lista_banco = Bancos::orderBy('nombre')->get();

      //Saldos por caja
      foreach ($lista_caja as $i => $lc) {
        $ingreso_caja = $egreso_caja = 0;
        $ingreso_caja = Cajas::ingreso_caja($lc->id);
        $egreso_caja = Cajas::egreso_caja($lc->id);
        $saldo_caja[$i]['nombre'] = $lc->nombre;
        $saldo_caja[$i]['saldo'] = $ingreso_caja - $egreso_caja;
      }

      //Saldo por bancos
      foreach ($lista_banco as $i => $lb) {
        $ingreso_banco = $egreso_banco = 0;
        $ingreso_banco = Cajas::ingreso_banco($lb->id);
        $egreso_banco = Cajas::egreso_banco($lb->id);
        $saldo_banco[$i]['nombre'] = $lb->nombre;
        $saldo_banco[$i]['saldo'] = $ingreso_banco - $egreso_banco;
      }

      //Ingresos
      $lista_prestamo = Prestamos::select(DB::raw('fecha_prestamos, sum(monto) as total, 0 as xt'))
                                  ->orderBy('fecha_prestamos')
                                  ->groupBy('fecha_prestamos')->get();

      //Egresos
      $union = Cajas::egresos();
      //Ordenar arreglo por fecha
      usort($union,array($this,"cmp"));
      //Agrupar cifras por fecha
      $j = 0;
      $primero = true;
      $size = sizeof($union);
      foreach ($union as $i => $un) {
        if($primero){
          $grupo[$j]['fecha'] = $union[$i]['fecha'];
          $grupo[$j]['servicio'] = $union[$i]['servicio'];
          $grupo[$j]['mobiliario'] = $union[$i]['mobiliario'];
          $grupo[$j]['compra'] = $union[$i]['compra'];
          $grupo[$j]['prestamo'] = $union[$i]['prestamo'];
          $grupo[$j]['reparacion'] = $union[$i]['reparacion'];
          $grupo[$j]['planilla'] = $union[$i]['planilla'];
          $primero = false;
        }
        if ($i < $size-1) {
          if($grupo[$j]['fecha']==$union[$i+1]['fecha']){
            $grupo[$j]['servicio'] += $union[$i]['servicio'];
            $grupo[$j]['mobiliario'] += $union[$i]['mobiliario'];
            $grupo[$j]['compra'] += $union[$i]['compra'];
            $grupo[$j]['prestamo'] += $union[$i]['prestamo'];
            $grupo[$j]['reparacion'] += $union[$i]['reparacion'];
            $grupo[$j]['planilla'] += $union[$i]['planilla'];
          }else{
            $j++;
            $primero = true;
          }
        }
      }

      //Obtener el stock por producto
      $lista_producto = Productos::orderBy('nombre')->get();
      foreach ($lista_producto as $i => $lp) {
        $stock[$i]['nombre'] = $lp->nombre;
        $stock[$i]['cantidad'] = Cajas::stock($lp->id);
      }
      
      //Renderizar la view
      return view('cajas.stats', compact(
        'hoy',
        'dia3',
        'saldo_caja',
        'saldo_banco',
        'lista_prestamo',
        'grupo',
        'stock'
      ));
    }
}
