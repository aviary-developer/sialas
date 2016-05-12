<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Bancos;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class BancosController extends Controller
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
      $bancosActivos= Bancos::buscar($name,$state);
      return view('bancos.index',compact('bancosActivos','bancosInactivos','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bancos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Bancos::create($request->All());
      return redirect('/bancos')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $banco = Bancos::find($id);
      return View::make('Bancos.show')->with('banco', $banco);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $bancos=Bancos::find($id);
      return view('bancos.edit', compact('bancos'));
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
      $bancos=Bancos::find($id);
      $bancos->fill($request->all());
      $bancos->save();
      Session::flash('mensaje','¡Registro Actualizado!');
      return Redirect::to('/bancos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bancos = Bancos::find($id);
       $bancos->estado=false;
       $bancos->save();
       Session::flash('mensaje','Registro dado de Baja');
       return Redirect::to('/bancos');
    }
    public function darAlta($id){
      $bancos = Bancos::find($id);
         $bancos->estado=true;
         $bancos->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/bancos');
    }
}
