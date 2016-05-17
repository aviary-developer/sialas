<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Clasificaciones;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class ClasificacionesController extends Controller
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
        $clasificacionesAc= Clasificaciones::buscar($name,$state);
        return view('clasificaciones.index',compact('clasificacionesAc','clasificacionesInac','state','name'));
        $data['activo'] = Clasificaciones::lists('activo','inactivo');
        return view('clasificaciones.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Clasificaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Clasificaciones::create($request->All());
        return redirect('/clasificaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clas = Clasificaciones::find($id);
        return View::make('Clasificaciones.show')->with('clas', $clas);
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
        $clasificacion = Clasificaciones::find($id);
        return view('Clasificaciones.edit',compact('tipo'));
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
        $clasificacion = Clasificaciones::find($id);
        $clasificacion->fill($request->All());
        $clasificacion->save();
        return Redirect::to('/clasificaciones');
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
        $clasificaciones = Clasificaciones::find($id);
         $clasificaciones->estado=false;
         $clasificaciones->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/clasificaciones');
    }
    public function darAlta($id){
      $clasificaciones = Clasificaciones::find($id);
         $clasificaciones->estado=true;
         $clasificaciones->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/clasificaciones');
    }
}