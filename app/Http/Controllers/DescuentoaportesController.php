<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Descuentoaportes;
use Redirect;
use Session;
use View;
use sialas\Http\Requests\DescuentoaportesRequest;

class DescuentoaportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      Descuentoaportes::iniciandoDesp();
      $state = $request->get('estado');
      $name = $request->get('nombre');
      $activos= Descuentoaportes::buscar($name,$state);
      return view('descuentoaportes.index',compact('activos','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('descuentoaportes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DescuentoaportesRequest $request)
    { Bitacoras::bitacora("Registro descuento/aportación: ".$request['nombre']);
      if($request['techo']==""){
        $request['techo']=0;
      }
      Descuentoaportes::create($request->all());
      return redirect('/descuentoaportes')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $s = Descuentoaportes::find($id);
      return View::make('descuentoaportes.show')->with('s', $s);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $valor=Descuentoaportes::find($id);

        return view('descuentoaportes.edit',compact('valor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(descuentoaportesRequest $request, $id)
    { Bitacoras::bitacora("Modificación de descuento/aportación: ".$request['nombre']);
      $valor=Descuentoaportes::find($id);

      if($request['techo']==""){
        $request['techo']=0;
      }
      $valor->fill($request->All());

      $valor->save();

      return Redirect::to('/descuentoaportes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$valor = Descuentoaportes::find($id);
       $valor->estado=false;
       $valor->save();
       Bitacoras::bitacora("Descuento/aportación enviado a papelera: ".$valor['nombre']);
       Session::flash('mensaje','Registro enviado a papelera');
       return Redirect::to('/descuentoaportes');
    }

    public function darAlta($id){
        $valor = Descuentoaportes::find($id);
         $valor->estado=true;
         $valor->save();
         Bitacoras::bitacora("Descuento/aportación activado: ".$valor['nombre']);
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/descuentoaportes');

    }

}
