<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Pagoservicios;
use sialas\Servicios;
use sialas\Cajas;
use sialas\Bancos;
use Redirect;
use Session;
use View;

class PagoserviciosController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function crear($servicio)
    {
      $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $s= Servicios::find($servicio);
      $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
      return view('pagoservicios.crear',compact('c','s','b','servicio'));
    }

    public function guardar(Request $request, $servicio)
    {
      $pago = new Pagoservicios;
      if($request->vradio){
        $pago->banco_id = null;
        $pago->caja_id = $request->caja_id;
        $pago->cheque = null;
      }else{
        $pago->caja_id = null;
        $pago->banco_id = $request->banco_id;
        $pago->cheque = $request->cheque;
      }
      $pago->renta = $request->renta;
      $pago->factura = $request->factura;
      $pago->servicio_id = $servicio;
      $pago->monto = $request->monto;
      $pago->iva = $request->iva;
      $pago->detalle = $request->detalle;
      $pago->save();
      return redirect('/servicios')->with('mensaje','Pago Guardado');
    }
}
