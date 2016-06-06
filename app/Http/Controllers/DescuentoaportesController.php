<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Descuentoaportes;
use Redirect;
use Session;
use View;

class DescuentoaportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $state = $request->get('estado');
      $name = $request->get('nombre');
      $activos= Descuentoaportes::buscar($name,$state);
      return view('descuentoaportes.index',compact('activos','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('descuentoaportes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request['techo']==""){
        $request['techo']=0;
      }
      descuentoaportes::create($request->all());
      return redirect('/descuentoaportes')->with('mensaje','Registro Guardado');
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
        $valor=Descuentoaportes::find($id);

        return view('descuentoaportes.edit',compact('valor'));
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
      $valor=Descuentoaportes::find($id);

      if($request['techo']==""){
        $request['techo']=0;
      }
      $valor->fill($request->All());

      $valor->save();

      return Redirect::to('/descuentoaportes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $valor = Descuentoaportes::find($id);
       $valor->estado=false;
       $valor->save();
       Session::flash('mensaje','Registro enviado a papelera');
       return Redirect::to('/descuentoaportes');
    }

    public function darAlta($id){

        $valor = Descuentoaportes::find($id);
         $valor->estado=true;
         $valor->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/descuentoaportes');

    }

}
