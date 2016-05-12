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
        $mobiliariosAc= Categorias::buscar($name,$state);
        return view('mobiliarios.index',compact('mobiliariosAc','mobiliariosInac','state','name'));
        $data['activo'] = Mobiliarios::lists('activo','inactivo');
        return view('mobiliarios.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Mobiliarios.create');
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
        return redirect('/mobiliarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mob = Mobiliarios::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Mobiliarios.show')->with('mob', $mob);
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
        $mobiliario = Mobiliarios::find($id);
        return view('Mobiliarios.edit',compact('mobiliario'));
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
        $mobiliario = Mobiliarios::find($id);
        $mobiliario->fill($request->All());
        $mobiliario->save();
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