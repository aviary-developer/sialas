<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Pagoreparaciones;
use sialas\Reparaciones;
use sialas\Cajas;
use sialas\Bancos;
use Redirect;
use Session;
use View;

class PagoreparacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $m= Reparaciones::orderBy('nombre','asc')->get();
      $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
      return view('pagoreparaciones.create',compact('c','m','b'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { Bitacoras::bitacora("Pago de reparación");
      $pago = new Pagoreparaciones;
      if($request->vradio){
        $pago->banco_id = null;
        $pago->caja_id = $request->caja_id;
        $pago->cheque = null;
        $pago->interes = null;
        $pago->mora = null;
      }else{
        $pago->caja_id = null;
        $pago->banco_id = $request->banco_id;
        $pago->cheque = $request->cheque;
        $pago->interes = $request->interes;
        $pago->mora = $request->mora;
      }
      $pago->factura = $request->factura;
      $pago->reparacion_id = $request->reparacion_id;
      $pago->monto = $request->monto;
      $pago->iva = $request->iva;
      $pago->detalle = $request->detalle;
      $pago->save();
      return redirect('/mobiliarios/'.$m->mobiliario_id)->with('mensaje','Pago Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function crear($reparacion)
    {
      $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $m= Reparaciones::find($reparacion);
      $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $f= Pagoreparaciones::where('reparacion_id',$reparacion)->count();
      $p= Pagoreparaciones::where('reparacion_id',$reparacion)->sum('monto');
      return view('pagoreparaciones.crear',
      compact(
      'c',
      'm',
      'b',
      'f',
      'p',
      'reparacion'
      ));
    }

    public function guardar(Request $request, $reparacion)
    { Bitacoras::bitacora("Pago de reparación");
      $pagoreparaciones = new Pagoreparaciones;
      if($request->vradio){
        $pagoreparaciones->banco_id = null;
        $pagoreparaciones->caja_id = $request->caja_id;
        $pagoreparaciones->cheque = null;
      }else{
        $pagoreparaciones->caja_id = null;
        $pagoreparaciones->banco_id = $request->banco_id;
        $pagoreparaciones->cheque = $request->cheque;
      }
      $pagoreparaciones->interes = $request->interes;
      $pagoreparaciones->mora = $request->mora;
      $pagoreparaciones->factura = $request->factura;
      $pagoreparaciones->reparacion_id = $reparacion;
      $pagoreparaciones->monto = $request->monto;
      $pagoreparaciones->iva = $request->iva;
      $pagoreparaciones->detalle = $request->detalle;
      $pagoreparaciones->save();
      $mm = Reparaciones::find($reparacion);
      return redirect('/mobiliarios/'.$mm->mobiliario_id)->with('mensaje','Pago de Reparacion Guardado');
    }
}
