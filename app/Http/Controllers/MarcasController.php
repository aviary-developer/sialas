<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Marcas;
use sialas\Productos;
use sialas\Http\Controllers\Controller;
use Redirect;
use View;
use Session;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$marcasActivas= Marcas::where('estado','=', 1)->orderBy('nombre')->get();
        $marcasInactivas= Marcas::where('estado','=', 0)->orderBy('nombre')->get();

        return view('marcas.index',compact('marcasActivas','marcasInactivas'));*/
        $state = $request->get('estado');
        $name = $request->get('nombre');
        $marcasActivas= Marcas::buscar($name,$state);
        return view('marcas.index',compact('marcasActivas','marcasInactivas','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Marcas::create($request->All());
        return redirect('/marcas')->with('mensaje','Registro Guardado');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Marcas::find($id);
        $p = Productos::where('marca_id',$id)->paginate(8);
        $w = Productos::where('marca_id',$id)->count();
        return view('Marcas.show',compact('c','p','w'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = Marcas::find($id);
        return view('Marcas.edit',compact('marcas'));
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
        $marcas = Marcas::find($id);
        $marcas->fill($request->All());
        $marcas->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcas = Marcas::find($id);
         $marcas->estado=false;
         $marcas->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/marcas');
    }
    public function darAlta($id){
        $marcas = Marcas::find($id);
         $marcas->estado=true;
         $marcas->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/marcas');
    }
}
