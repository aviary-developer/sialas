<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Tipos;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       // $state = $request->get('estado');
        $name = $request->get('nombre');
        $tiposAc= Tipos::buscar($name);
        return view('tipos.index',compact('tiposAc','tiposInac','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tipos::create($request->All());
        return redirect('/tipos')->->with('mensaje', 'Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tip = Tipos::find($id);
        return View::make('Tipos.show')->with('tip', $tip);
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
        $tipo = Tipos::find($id);
        return view('Tipos.edit',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//////////ME QUEDE AQUI... QUITO EL REQUEST PORQ NO LLEVO STATE?
    {
        //
        $categoria = Categorias::find($id);
        $categoria->fill($request->All());
        $categoria->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/categorias');
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
        $categorias = Categorias::find($id);
         $categorias->estado=false;
         $categorias->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/categorias');
    }
    public function darAlta($id){
      $categorias = Categorias::find($id);
         $categorias->estado=true;
         $categorias->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/categorias');
    }
}
