<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Prestamos;
use sialas\Pagosprestamos;
use sialas\Cajas;
use sialas\Bancos;
use Redirect;
use Session;
use View;

class PagosprestamosController extends Controller
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
      $m= Prestamos::orderBy('banconombre','asc')->get();
      $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
      return view('pagosprestamos.create',compact('c','m','b'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $pago = new Pagosprestamos;
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
      return redirect('/prestamos/')->with('mensaje','Pago Guardado');
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

    public function crear($prestamo)
    {
      $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $m= Prestamos::find($prestamo);
      $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $f= Pagosprestamos::where('prestamo_id',$prestamo)->count();
      $p= Pagosprestamos::where('prestamo_id',$prestamo)->sum('monto');
      return view('pagosprestamos.crear',
      compact(
      'c',
      'm',
      'b',
      'f',
      'p',
      'prestamo'
      ));
    }

    public function guardar(Request $request, $prestamo)
    {
      $pagoreparaciones = new Pagosprestamos;
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
      $pagoreparaciones->prestamo_id = $prestamo;
      $pagoreparaciones->monto = $request->monto;
      $pagoreparaciones->iva = $request->iva;
      $pagoreparaciones->detalle = $request->detalle;
      $pagoreparaciones->save();
      $mm = Prestamos::find($prestamo);
      return redirect('/prestamos/')->with('mensaje','Pago de Prestamo Guardado');
    }

}
