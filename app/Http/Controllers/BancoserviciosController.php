<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Bancoservicios;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class BancoserviciosController extends Controller
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
        $bancAc= Bancoservicios::buscar($name,$state);
        return view('bancoservicios.index',compact('bancAc','bancInac','state','name'));
        $data['activo'] = Bancoservicios::lists('activo','inactivo');
        return view('bancoservicios.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Bancoservicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bancoservicios::create($request->All());
        return redirect('/bancoservicios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ban = Bancoservicios::find($id);
        return View::make('Bancoservicios.show')->with('ban', $ban);
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
        $bancoservicio = Bancoservicios::find($id);
        return view('Bancoservicios.edit',compact('bancoservicio'));
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
        $bancoservicio = Bancoservicios::find($id);
        $bancoservicio->fill($request->All());
        $bancoservicio->save();
        return Redirect::to('/bancoservicios');
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
        $bancoservicios = Bancoservicios::find($id);
         $bancoservicios->estado=false;
         $bancoservicios->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/bancoservicios');
    }
    public function darAlta($id){
      $bancoservicios = Bancoservicios::find($id);
         $bancoservicios->estado=true;
         $bancoservicios->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/bancoservicios');
    }
}