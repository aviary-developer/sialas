<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Prestamos;
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
      $p = Prestamos::find($id);
      return View::make('Prestamos.show')->with('p', $p);
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
