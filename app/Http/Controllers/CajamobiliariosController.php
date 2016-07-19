<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Cajamobiliarios;
use sialas\Bancomobiliarios;
use sialas\Cajas;
use sialas\Mobiliarios;
use Redirect;
use Session;
use View;
use sialas\Bitacoras;

class CajamobiliariosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cajamobiliarios=Cajamobiliarios::orderBy('created_at','asc')->paginate(8);
        return view('Cajamobiliarios.index',compact('cajamobiliarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Mobiliarios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Cajamobiliarios.create',compact('c','m'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bitacoras::bitacora("Registro nuevo pago de mobiliario");
        if($request->vradio == 'Efectivo'){
            $caja = new Cajamobiliarios;
            $caja->monto = $request->monto;
            $caja->caja_id = $request->caja_id;
            $caja->mobiliario_id = $request->mobiliario_id;
            $caja->detalle = $request->detalle;
            $caja->save();
            return redirect('/cajamobiliarios')->with('mensaje','Registro Guardado');
        }else{
            $banco = new Bancosmobiliarios;
            $banco->banco_id = $request->banco_id;
            $banco->mobiliario_id = $request->mobiliario_id;
            $banco->cheque = $request->cheque;
            $banco->detalle = $request->detalle;
            $banco->cantidad = $request->monto;
            $banco->save();
            return redirect('/bancomobiliarios')->with('mensaje','Registro Guardado');
        }

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
        $c = Cajamobiliarios::find($id);

        return View::make('Cajamobiliarios.show')->with('c', $c);
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
        $cajamobiliarios =Cajamobiliarios::find($id);
        $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Mobiliarios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Cajamobiliarios.edit',compact('cajamobiliarios','c','m'));
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
        Bitacoras::bitacora("Modificación datos pago  de mobiliario");
        $cajamobiliarios = Cajamobiliarios::find($id);
        $cajamobiliarios->fill($request->All());
        $cajamobiliarios->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/cajamobiliarios');
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
