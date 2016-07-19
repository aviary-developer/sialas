<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
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
      $r= Remesas::All();
      return view('Remesas.index',compact('r'));

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
    {       Bitacoras::bitacora("Registro de remesa");
            $remesa = new Remesas;
            $remesa->caja_id = $request->cajaTipo;
            $remesa->banco_id = $request->bancoTipo;
            $remesa->monto = $request->Monto;
            $remesa->transaccion = $request->transaccion;
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
      $r = Remesas::find($id);
      return View::make('Remesas.show')->with('r', $r);
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
        //
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
