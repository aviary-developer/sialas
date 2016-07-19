<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
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

        $name = $request->get('nombre');
        $tipos= Tipos::buscar($name);
        return view('tipos.index',compact('tipos','name'));

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
    {   Bitacoras::bitacora("Registro de nuevo tipo: ".$request['nombre']);
        Tipos::create($request->All());
        return redirect('/tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Tipos::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Tipos.show')->with('c', $c);
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
        $tipos = Tipos::find($id);
        return view('Tipos.edit',compact('tipos'));
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
        Bitacoras::bitacora("Modificación de tipo: ".$request['nombre']);
        $tipo = Tipos::find($id);
        $tipo->fill($request->All());
        $tipo->save();
        //Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
