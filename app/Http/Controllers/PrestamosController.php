<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Prestamos;
use sialas\Pagosprestamos;
use sialas\Bancos;
use sialas\Cajas;
use DB;
use Redirect;
use Session;
use View;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $prestamos=Prestamos::All();
      return view('prestamos.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $b= Bancos::All();
      $c= Cajas::All();
      return view('prestamos.create',compact('b','c'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $reparacion = new Prestamos;
      $reparacion->banconombre = $request->banconombre;
      $reparacion->monto = $request->monto;
      $reparacion->interes = $request->interes;
        $reparacion->num_cuotas= $request->num_cuotas;
      $reparacion->valor_cuotas= $request->valor_cuotas;
      $reparacion->cuenta= $request->cuenta;
      $reparacion->tiempo_pago = $request->tiempo_pago;
      $reparacion->dia_pago= $request->dia_pago;
      $reparacion->garantia= $request->garantia;
      $reparacion->deposito= $request->deposito;
      if($request->deposito == 1)
      {
        $reparacion->banco_id = null;
        $reparacion->caja_id = $request->caja_id;
      }
      else {
        $reparacion->banco_id = $request->banco_id;
        $reparacion->caja_id = $request-> null;
      }


      $reparacion->save();
      return redirect('/prestamos')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $mob = Prestamos::find($id);
      //Pagos
      $montoTotal = Pagosprestamos::where('prestamo_id',$id)->sum('monto');
      $interTotal = Pagosprestamos::where('prestamo_id',$id)->sum('interes');
      $moraTotal = Pagosprestamos::where('prestamo_id',$id)->sum('mora');
      $cuotas = Pagosprestamos::where('prestamo_id',$id)->count();
      $cuotasc = Pagosprestamos::where('prestamo_id',$id)->where('caja_id', '>',0)->count();
      $cuotasb = Pagosprestamos::where('prestamo_id',$id)->where('banco_id', '>',0)->count();
      $pagoss = Pagosprestamos::where('prestamo_id',$id)->orderBy('created_at','asc')->get();
      $listac = Pagosprestamos::where('prestamo_id',$id)->where('caja_id', '>',0)->orderBy('created_at','asc')->paginate(8);
      $listab = Pagosprestamos::where('prestamo_id',$id)->where('banco_id', '>',0)->orderBy('created_at','asc')->paginate(8);
      $cc = Pagosprestamos::where('prestamo_id',$id)->where('caja_id', '>',0)->sum('monto');
      $cb = Pagosprestamos::where('prestamo_id',$id)->where('banco_id', '>',0)->sum('monto');
      $ic = Pagosprestamos::where('prestamo_id',$id)->where('caja_id', '>',0)->sum('interes');
      $ib = Pagosprestamos::where('prestamo_id',$id)->where('banco_id', '>',0)->sum('interes');
      $mc = Pagosprestamos::where('prestamo_id',$id)->where('caja_id', '>',0)->sum('mora');
      $mb = Pagosprestamos::where('prestamo_id',$id)->where('banco_id', '>',0)->sum('mora');
      $totalc = $cc + $ic + $mc;
      $totalb = $cb + $ib + $mb;
      return view('Prestamos.show',
      compact(
      'mob',
      'montoTotal',
      'interTotal',
      'cuotas',
      'moraTotal',
      'pagoss',
      'cuotasc',
      'cuotasb',
      'listac',
      'listab',
      'totalc',
      'totalb',
      'cc',
      'cb',
      'ic',
      'ib',
      'mc',
      'mb'  ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $prestamo = Prestamos::find($id);
      return view('prestamos.edit',compact('prestamo'));
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
      $prestamos=Prestamos::find($id);
      $prestamos->fill($request->All());
      $prestamos->save();
      return Redirect::to('/prestamos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
