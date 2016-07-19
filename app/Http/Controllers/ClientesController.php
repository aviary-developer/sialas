<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Requests\ClientesRequest;
use sialas\Http\Controllers\Controller;
use sialas\clientes;
use DB;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $state = $request->get('estado');
        $name = $request->get('nombre');
        $clientesActivos= Clientes::buscar($name,$state);
        return view('clientes.index',compact('clientesActivos','clientesInactivos','state','name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Clientes.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        Bitacoras::bitacora("Registro de nuevo cliente: ".$request['nombre']." ".$request['apellido']);
        Clientes::create($request->All());
        return redirect('/clientes')->with('mensaje','Registro Guardado');

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
         $c = Clientes::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Clientes.show')->with('c', $c);
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
        $cliente=Clientes::find($id);
        return view('Clientes.edit', compact('cliente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesRequest $request, $id)
    {   Bitacoras::bitacora("Modificación de cliente: ".$request['nombre']." ".$request['apellido']);
        //
        $cliente=Clientes::find($id);
        $cliente->fill($request->all());
        $cliente->save();
        return Redirect::to('/clientes');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    $clientes = Clientes::find($id);
         $clientes->estado=false;
         $clientes->save();
         Bitacoras::bitacora("Cliente enviado a papelera: ".$clientes['nombre']." ".$clientes['apellido']);
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/clientes');

    }
     public function darAlta($id){
        $clientes = Clientes::find($id);
         $clientes->estado=true;
         $clientes->save();
         Bitacoras::bitacora("Cliente activado: ".$clientes['nombre']." ".$clientes['apellido']);
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/clientes');


    }
}
