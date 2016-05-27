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
        $bancAc= Bancoservicios::orderBy('cheque')->get();
        return view('bancoservicios.index',compact('bancAc','bancInac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $servicios=Servicios::where('estado',true)->orderBy('nombre')->get();
        $bancos=Bancos::where('estado',true)->orderBy('nombre')->get();
        return view('Bancoservicios.create',compact('bancos','servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    }
    public function darAlta($id){
      $bancoservicios = Bancoservicios::find($id);
         $bancoservicios->estado=true;
         $bancoservicios->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/bancoservicios');
    }
}