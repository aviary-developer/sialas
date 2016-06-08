<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Pagocompras;
use sialas\Compras;
use sialas\Detallecompras;
use sialas\Cajas;
use sialas\Bancos;
use Redirect;
use Session;
use View;

class PagocomprasController extends Controller
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
    public function crear($compra)
    {
      $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $m= Compras::find($compra);
      $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
      $f= Pagocompras::where('compra_id',$compra)->count();
      $p= Pagocompras::where('compra_id',$compra)->sum('monto');
      $i= Pagocompras::where('compra_id',$compra)->sum('iva');
      //Obtener el total del monto y el IVA
      $pc = Detallecompras::where('compra_id',$compra)->sum('precio');
      $ic = Detallecompras::where('compra_id',$compra)->sum('iva');
      return view('pagocompras.crear',compact('c','m','b','i','f','pc','ic','p','compra'));
    }

    public function guardar(Request $request, $compra)
    {
      $pago = new Pagocompras;
      if($request->vradio){
        $pago->banco_id = null;
        $pago->caja_id = $request->caja_id;
        $pago->cheque = null;
      }else{
        $pago->caja_id = null;
        $pago->banco_id = $request->banco_id;
        $pago->cheque = $request->cheque;
      }
      $pago->interes = $request->interes;
      $pago->mora = $request->mora;
      $pago->recibo = $request->recibo;
      $pago->compra_id = $compra;
      $pago->monto = $request->monto;
      $pago->iva = $request->iva;
      $pago->detalle = $request->detalle;
      $pago->save();
      return redirect('/compras')->with('mensaje','Pago Guardado');
    }
}
