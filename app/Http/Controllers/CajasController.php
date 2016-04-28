<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Cajas;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;

class CajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajasActivas= Cajas::where('estado','=', 1)->orderBy('nombre','asc')->paginate(10);
        $cajasInactivas= Cajas::where('estado','=', 0)->orderBy('nombre','asc')->paginate(10);
        return view('cajas.index',compact('cajasActivas','cajasInactivas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cajas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cajas::create($request->All());
        return redirect('/cajas')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cajas = Cajas::where('id','=',$id)->get();
        return view('Cajas.show',compact('cajas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cajas=Cajas::find($id);
      return view('cajas.edit', compact('cajas'));
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
      $cajas=Cajas::find($id);
      $cajas->fill($request->all());
      $cajas->save();
      Session::flash('mensaje','¡Registro Actualizado!');
      return Redirect::to('/cajas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cajas = Cajas::find($id);
         $cajas->estado=false;
         $cajas->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/cajas');
    }
    public function darAlta($id){
      $cajas = Cajas::find($id);
         $cajas->estado=true;
         $cajas->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/cajas');
    }
}
