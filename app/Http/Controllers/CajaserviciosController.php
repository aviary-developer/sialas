<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
use sialas\Http\Requests;
use Input;
use Response;
use sialas\Http\Controllers\Controller;
use sialas\Cajas;
use sialas\Servicios;
use sialas\Cajaservicios;

use Redirect;
use View;
use Session;

class CajaserviciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajaservicios=Cajaservicios::orderBy('created_at','asc')->paginate(8);
        return view('Cajaservicios.index',compact('cajaservicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Servicios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('cajaservicios.create',compact('c','m'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   Bitacoras::bitacora("Pago de servicio");
        Cajaservicios::create($request->All());
        return redirect('/cajaservicios')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Cajaservicios::find($id);

        return View::make('Cajaservicios.show')->with('c', $c);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cajaservicios =Cajaservicios::find($id);
        $c= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Servicios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Cajaservicios.edit',compact('cajaservicios','c','m'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   Bitacoras::bitacora("Modificación pago de servicio");
        $cajaservicios = Cajaservicios::find($id);
        $cajaservicios->fill($request->All());
        $cajaservicios->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/cajaservicios');
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
