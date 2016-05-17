<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Bancomobiliarios;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class BancomobiliariosController extends Controller
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
        $bancomobiliariosAc= Bancomobiliarios::buscar($name,$state);
        return view('bancomobiliarios.index',compact('bancomobiliariosAc','bancomobiliariosInac','state','name'));
        $data['activo'] = Bancomobiliarios::lists('activo','inactivo');
        return view('bancomobiliarios.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Bancomobiliarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bancomobiliarios::create($request->All());
        return redirect('/bancomobiliarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banm = Bancomobiliarios::find($id);
        return View::make('Bancomobiliarios.show')->with('banm', $banm);
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
        $bancomobiliario = Bancomobiliarios::find($id);
        return view('Bancomobiliarios.edit',compact('bancomobiliario'));
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
        $bancomobiliario = Bancomobiliarios::find($id);
        $bancomobiliario->fill($request->All());
        $bancomobiliario->save();
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
        $bancomobiliarios = Bancomobiliarios::find($id);
         $bancomobiliarios->estado=false;
         $bancomobiliarios->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/bancomobiliarios');
    }
    public function darAlta($id){
      $bancomobiliarios = Bancomobiliarios::find($id);
         $bancomobiliarios->estado=true;
         $bancomobiliarios->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/bancomobiliarios');
    }
}