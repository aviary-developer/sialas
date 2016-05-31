<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\remesas;
use sialas\bancos;
use sialas\cajas;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class RemesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // $remesas=Remesas::where('transaccion',true)->orderBy('nombre')->get();
    
      //return $productos;
      //return view('Compras.create',compact('productos','proveedores'));
        $TipoCaja=Cajas::Lists('nombre');
        $TipoBanco=Bancos::Lists('nombre');
        return view('Remesas.create',compact('TipoCaja','TipoBanco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               // Remesas::create($request->All());
        $remesa = new Remesas;
        $remesa->caja_id = $request->cajaTipo;
        $remesa->save();
        return redirect('/remesas')->with('mensaje','Registro Guardado');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remesa=Remesas::find($id);
        return view('Remesas.edit', compact('remesa'));
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
        $remesa=Remesas::find($id);
        $remesa->fill($request->all());
        $remesa->save();
        return Redirect::to('/remesas');
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
