<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\User;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;

class MobiliariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mobiliarioAc=Mobiliarios::where('estado','=', 1)->orderBy('name','asc')->paginate(10);//estamos guardando dentro de la var todo lo q tiene la taba usuarios
        $mobiliarioInac=Mobiliarios::where('estado','=', 0)->orderBy('name','asc')->paginate(10);
        return view('mobiliarios.index',compact('mobiliarioAc', 'mobiliarioInac'));
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
        //
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
        //
        $mobiliarios = Mobiliarios::where('id','=',$id)->get();
        return view('Mobiliarios.show',compact('mobiliarios'));
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
        $mobiliarios=Mobiliarios::find($id);
        return view('mobiliarios.edit', compact('mobiliarios'));
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
        $mobiliarios=Mobiliarios::find($id);
        $mobiliarios->fill($request->all());
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
        $mobiliarios=Mobiliarios::find($id);
        $mobiliarios->estado=false;
        $mobiliarios->save();
        Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/mobiliarios');
    }
    public function darAlta($id)
    {
        $mobiliarios=Mobiliarios::find($id);
        $mobiliarios->estado=true;
        $mobiliarios->save();
        Session::flash('mensaje','Registro dado de Alta');
        return Redirect::to('/mobiliarios');
    }
}
