<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Bancoservicios;
use sialas\Cajaservicios;
use sialas\Bancos;
use sialas\Servicios;
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
        $bancAc= Bancoservicios::orderBy('created_at','asc')->paginate(8);
        return view('Bancoservicios.index',compact('bancAc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $b=Bancos::where('estado','=',1)->orderBy('nombre','asc')->get();
        $s=Servicios::where('estado','=',1)->orderBy('nombre','asc')->get();
        return view('Bancoservicios.create',compact('b','s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        Bancoservicios::create($request->All());
        return redirect('/bancoservicios')->with('mensaje','Registro Guardado');
    }*/

    public function store(Request $request)
    {
        //
        if($request->vradio == 'Cheque'){
            $banco = new Bancoservicios;
            $banco->cantidad = $request->cantidad;
            $banco->banco_id = $request->banco_id;
            $banco->save();
            return redirect('/bancoservicios')->with('mensaje','Registro Guardado');
        }else{
            $caja = new Cajaservicios;
            $caja->monto = $request->monto;
            $caja->save();
            return redirect('/cajaservicios')->with('mensaje','Registro Guardado');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Bancoservicios::find($id);
        return View::make('Bancoservicios.show')->with('c', $c);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bancoservicios =Bancoservicios::find($id);
        $b= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $s= Servicios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Bancoservicios.edit',compact('bancoservicios','s','b'));
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
        $bancoservicios = Bancoservicios::find($id);
        $bancoservicios->fill($request->All());
        $bancoservicios->save();
        Session::flash('mensaje','¡Registro Actualizado!');
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
    }
}