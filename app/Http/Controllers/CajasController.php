<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Cajas;
use sialas\Bancos;
use sialas\Prestamos;
use sialas\Pagoservicios;
use sialas\Pagos;
use sialas\Pagoreparaciones;
use sialas\Pagosprestamos;
use sialas\Pagocompras;
use sialas\Remesas;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class CajasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $state = $request->get('estado');
      $name = $request->get('nombre');
      $cajasActivas= Cajas::buscar($name,$state);
      return view('cajas.index',compact('cajasActivas','cajasInactivas','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cajas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cajas::create($request->All());
        return redirect('/cajas')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $caja = Cajas::find($id);
      //return view('Categorias.show',compact('categorias'));
      return View::make('Cajas.show')->with('caja', $caja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cajas=Cajas::find($id);
      return view('cajas.edit', compact('cajas'));
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
      $cajas=Cajas::find($id);
      $cajas->fill($request->all());
      $cajas->save();
      Session::flash('mensaje','¡Registro Actualizado!');
      return Redirect::to('/cajas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cajas = Cajas::find($id);
         $cajas->estado=false;
         $cajas->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/cajas');
    }
    public function darAlta($id){
      $cajas = Cajas::find($id);
         $cajas->estado=true;
         $cajas->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/cajas');
    }
    //Función para mostrar las estadisticas
    public function stats(){
      //Listar cajas
      $lista_cajas = Cajas::get();
      //Listar bancos
      $lista_bancos = Bancos::get();

      //Saldos por caja
      foreach ($lista_cajas as $i => $lc) {
        $ingreso_caja = $egreso_caja = 0;
        $ingreso_caja = Cajas::ingreso_caja($lc->id);
        $egreso_caja = Cajas::
      }
      //Renderizar la view
      return view('cajas.stats', compact(
        'saldo_actual_caja',
        'saldo_actual_banco'
      ));
    }
}
