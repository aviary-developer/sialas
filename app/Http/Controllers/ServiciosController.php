<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\servicios;
use sialas\Http\Requests\ServiciosRequest;
use DB;
use Redirect;
use Session;
use View;


class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /*$activos= Servicios::where('estado', 1)->get();
        $inactivos= Servicios::where('estado', 0)->get();

        return view('servicios.index',compact('activos','inactivos'));*/
        $state = $request->get('estado');
        $name = $request->get('nombre');
        $serviciosActivos= Servicios::buscar($name,$state);
        return view('servicios.index',compact('serviciosActivos','serviciosInactivos','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiciosRequest $request)
    {
      Servicios::create($request->all());
      return redirect('/servicios')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $s = Servicios::find($id);
        return View::make('Servicios.show')->with('s', $s);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Servicios::find($id);

        return view('servicios.edit',compact('servicio'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiciosRequest $request, $id)
    {
        $servicios=Servicios::find($id);

        $servicios->fill($request->All());

        $servicios->save();

        return Redirect::to('/servicios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicios = Servicios::find($id);
         $servicios->estado=false;
         $servicios->save();
         Session::flash('mensaje','Registro enviado a papelera');
         return Redirect::to('/servicios');
    }

    public function darAlta($id){

        $servicios = Servicios::find($id);
         $servicios->estado=true;
         $servicios->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/servicios');

    }
}
