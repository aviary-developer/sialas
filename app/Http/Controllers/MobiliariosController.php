<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Mobiliarios;
use sialas\Tipos;
use sialas\Proveedores;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class MobiliariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $state = $request->get('estado');
        $name = $request->get('nombre');
        $mobiliarios= Mobiliarios::buscar($name,$state);//la variable estadoo 0=Vendido, 1=en uso 2=desechado,3=reparacion 4=donado,
        return view('mobiliarios.index',compact('mobiliarios','state','name'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $c= Tipos::orderBy('nombre','asc')->get();
        $m= Proveedores::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Mobiliarios.create',compact('c','m'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mobiliarios::create($request->All());
        return redirect('/mobiliarios')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Mobiliarios::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Mobiliarios.show')->with('c', $c);
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
        $mobiliarios = Mobiliarios::find($id);
        $c= Tipos::orderBy('nombre','asc')->get();
        $m= Proveedores::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Mobiliarios.edit',compact('mobiliarios','c','m'));
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
        $mobiliarios = Mobiliarios::find($id);
        $mobiliarios->fill($request->All());
        $mobiliarios->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/mobiliarios');
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
         $mobiliarios = Mobiliarios::find($id);
         $mobiliarios->estado=false;
         $mobiliarios->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/mobiliarios');
    }
    public function darAlta($id){
         $mobiliarios = Mobiliarios::find($id);
         $mobiliarios->estado=true;
         $mobiliarios->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/mobiliarios');
    }
}