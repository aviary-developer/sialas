<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;
use sialas\Ubicaciones;

class UbicacionesController extends Controller
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
      $cajasActivas= Ubicaciones::buscar($name,$state);
      return view('ubicaciones.index',compact('cajasActivas','cajasInactivas','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ubicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Ubicaciones::create($request->All());
      return redirect('/ubicaciones')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ubicacion = Ubicaciones::find($id);
      //return view('Categorias.show',compact('categorias'));
      return View::make('Ubicaciones.show')->with('ubicacion', $ubicacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $ubicaciones=Ubicaciones::find($id);
      return view('ubicaciones.edit', compact('ubicaciones'));
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
      $ubicaciones=Ubicaciones::find($id);
      $ubicaciones->fill($request->all());
      $ubicaciones->save();
      Session::flash('mensaje','¡Registro Actualizado!');
      return Redirect::to('/ubicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ubicaciones = Ubicaciones::find($id);
       $ubicaciones->estado=false;
       $ubicaciones->save();
       Session::flash('mensaje','Registro dado de Baja');
       return Redirect::to('/ubicaciones');
    }
    public function darAlta($id){
      $ubicaciones = Ubicaciones::find($id);
         $ubicaciones->estado=true;
         $ubicaciones->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/ubicaciones');
    }
}
