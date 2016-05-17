<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Distribuidores;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class DistribuidoresController extends Controller
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
        $distribuidoresAc= Distribuidores::buscar($name,$state);
        return view('distribuidores.index',compact('distribuidoresAc','distribuidoresInac','state','name'));
        $data['activo'] = Distribuidores::lists('activo','inactivo');
        return view('distribuidores.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Distribuidores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Distribuidores::create($request->All());
        return redirect('/distribuidores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dis = Distribuidores::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Distribuidores.show')->with('dis', $dis);
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
        $distribuidor = Distribuidores::find($id);
        return view('Distribuidores.edit',compact('distribuidor'));
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
        $distribuidor = Distribuidores::find($id);
        $distribuidor->fill($request->All());
        $distribuidor->save();
        return Redirect::to('/distribuidores');
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
        $distribuidores = Distribuidores::find($id);
         $distribuidores->estado=false;
         $distribuidores->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/distribuidores');
    }
    public function darAlta($id){
      $distribuidores = Distribuidores::find($id);
         $distribuidores->estado=true;
         $distribuidores->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/distribuidores');
    }
}