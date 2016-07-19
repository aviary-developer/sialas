<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Mobiliarios;
use sialas\Proveedores;
use sialas\Reparaciones;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class ReparacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reparaciones=Reparaciones::All();
        return view('reparaciones.index',compact('reparaciones'));

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

     public function crear($mobiliario)
    {

      $m= Mobiliarios::find($mobiliario);
      $p= Proveedores::All();
      return view('reparaciones.crear',compact('m','p','mobiliario'));
    }

    public function guardar(Request $request, $mobiliario)
    { Bitacoras::bitacora("Registro de reparación");
      $reparacion = new Reparaciones;
      $reparacion->precio = $request->precio;
      $reparacion->iva = $request->iva;
      $reparacion->fecha_deposito = $request->fecha_deposito;
      $reparacion->diagnostico= $request->diagnostico;
      $reparacion->proveedor_id= $request->proveedor_id;
      if($request->fecha_entrega == "")
      { $reparacion->fecha_entrega = null;}
      else {$reparacion->fecha_entrega = $request->fecha_entrega;}
      $reparacion->mobiliario_id = $mobiliario;
      $reparacion->credito = $request->credito;
      if($request->credito == 0 )
    {
      $reparacion->interes=null;
      $reparacion->num_cuotas=null;
      $reparacion->val_cuotas=null;
      $reparacion->tiempo_pago=null;
      $reparacion->cuenta=null;
    }else
    {
      $reparacion->interes= $request->interes;
      $reparacion->num_cuotas= $request->num_cuotas;
      $reparacion->val_cuotas= $request->val_cuotas;
      $reparacion->tiempo_pago= $request->tiempo_pago;
      $reparacion->cuenta= $request->cuenta;
    }

      $reparacion->save();
      return redirect('/mobiliarios')->with('mensaje','Reparacion guardada');
    }
}
