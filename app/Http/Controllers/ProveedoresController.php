<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\Bitacoras;
use sialas\Http\Requests;
use sialas\Http\Requests\ProveedoresRequest;
use sialas\Http\Controllers\Controller;
use sialas\Proveedores;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class ProveedoresController extends Controller
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
        $proveedoresActivos= proveedores::buscar($name,$state);
        return view('proveedores.index',compact('proveedoresActivos','proveedoresInactivos','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedoresRequest $request)
    {
          Bitacoras::bitacora("Registro de nuevo proveedor: ".$request['nombre']);
         Proveedores::create($request->All());
        return redirect('/proveedores')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $p = Proveedores::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Proveedores.show')->with('p', $p);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $proveedor=Proveedores::find($id);
        return view('Proveedores.edit', compact('proveedor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    Bitacoras::bitacora("Modificación de proveedor: ".$request['nombre']);
         $proveedor=Proveedores::find($id);
        $proveedor->fill($request->all());
        $proveedor->save();
        return Redirect::to('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    $proveedores = Proveedores::find($id);
         $proveedores->estado=false;
         $proveedores->save();
         Bitacoras::bitacora("Proveedor enviado a papelera: ".$proveedores['nombre']);
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/proveedores');
    }

    public function darAlta($id){

        $proveedores = Proveedores::find($id);
         $proveedores->estado=true;
         $proveedores->save();
         Bitacoras::bitacora("Proveedor activado: ".$proveedores['nombre']);
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/proveedores');


    }
}
