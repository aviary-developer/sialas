<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Categorias;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class CategoriasController extends Controller
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
        $categoriasActivas= Categorias::buscar($name,$state);
        return view('categorias.index',compact('categoriasActivas','categoriasInactivas','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categorias::create($request->All());
        return redirect('/categorias')->with('mensaje', 'Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Categorias::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Categorias.show')->with('c', $c);
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
        $categoria = Categorias::find($id);
        return view('Categorias.edit',compact('categoria'));
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
