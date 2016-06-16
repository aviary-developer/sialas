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
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    

         $TipoCaja=Cajas::where('estado',true)->orderBy('nombre')->get();
         $TipoBanco=Bancos::where('estado',true)->orderBy('nombre')->get();
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
        //Remesas::create($request->All());
       // return redirect('/remesas')->with('mensaje','Registro Guardado');

       if($request->vradio == 'Remesa'){
            $caja = new Remesas;
            $caja->monto = $request->monto;
            $caja->caja_id = $request->caja_id;
            $caja->banco_id = $request->banco_id;
            $caja->save();
            return redirect('/remesas')->with('mensaje','Registro Guardado');
        } else{
           /* $banco = new Remesas;
            $banco->banco_id = $request->banco_id;
            $banco->monto = $request->monto;
            $banco->save();*/
            return redirect('/remesas')->with('mensaje','Registro Guardado');
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
}
