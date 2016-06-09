<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Mobiliarios;
use sialas\Tipos;
use sialas\Proveedores;
use Redirect;
use Session;
use View;
use Carbon\Carbon;

class MobiliariosController extends Controller
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
        $mobiliarios= Mobiliarios::buscar($name,$state);//la variable estadoo 0=Vendido, 1=en uso 2=desechado,3=reparacion 4=donado,
        return view('mobiliarios.index',compact('mobiliarios','state','name'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $c= Tipos::orderBy('nombre','asc')->get();
        $m= Proveedores::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Mobiliarios.create',compact('c','m'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $mobiliario = new Mobiliarios;
        $mobiliario->codigo = $request->codigo;
        $mobiliario->nombre= $request->nombre;
        $mobiliario->fecha_compra= $request->fecha_compra;
        $mobiliario->precio= $request->precio;
        $mobiliario->descripcion =$request->descripcion;
        $mobiliario->estado = $request->estado;
        $mobiliario->nuevo = $request->nuevo;
        if($request->anios == '' || $request->nuevo == 1){
            $mobiliario->anios=null;
        }else
        {
            $mobiliario->anios = $request->anios;
        }
        $mobiliario->proveedor_id = $request->proveedor_id;
        $mobiliario->tipo_id = $request->tipo_id;
        if($request->credito == 0 )
        {
            $mobiliario->interes=null;
            $mobiliario->num_cuotas=null;
            $mobiliario->val_cuotas=null;
            $mobiliario->tiempo_pago=null;
            $mobiliario->cuenta=null;
            $mobiliario->dia_pago=null;
        }else
        {
            $mobiliario->interes= $request->interes;
            $mobiliario->num_cuotas= $request->num_cuotas;
            $mobiliario->val_cuotas= $request->val_cuotas;
            $mobiliario->tiempo_pago= $request->tiempo_pago;
            $mobiliario->cuenta= $request->cuenta;
            $mobiliario->dia_pago= $request->dia_pago;

        }
        

        $mobiliario->save();
        return redirect('/mobiliarios')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Mobiliarios::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Mobiliarios.show')->with('c', $c);
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
        $mobiliarios = Mobiliarios::find($id);
        $c= Tipos::orderBy('nombre','asc')->get();
        $m= Proveedores::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Mobiliarios.edit',compact('mobiliarios','c','m'));
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
        $mobiliarios = Mobiliarios::find($id);
        $mobiliarios->codigo = $request->codigo;
        $mobiliarios->nombre= $request->nombre;
        $mobiliarios->fecha_compra= $request->fecha_compra;
        $mobiliarios->precio= $request->precio;
        $mobiliarios->descripcion =$request->descripcion;
        $mobiliarios->estado = $request->estado;
        $mobiliarios->nuevo = $request->nuevo;
        if($request->anios == '' || $request->nuevo == 1){
            $mobiliarios->anios=null;
        }else
        {
            $mobiliarios->anios = $request->anios;
        }
        $mobiliarios->proveedor_id = $request->proveedor_id;
        $mobiliarios->tipo_id = $request->tipo_id;
        if($request->credito == 0 )
        {
            $mobiliarios->interes=null;
            $mobiliarios->num_cuotas=null;
            $mobiliarios->val_cuotas=null;
            $mobiliarios->tiempo_pago=null;
            $mobiliarios->cuenta=null;
            $mobiliarios->dia_pago=null;
        }else
        {
            $mobiliarios->interes= $request->interes;
            $mobiliarios->num_cuotas= $request->num_cuotas;
            $mobiliarios->val_cuotas= $request->val_cuotas;
            $mobiliarios->tiempo_pago= $request->tiempo_pago;
            $mobiliarios->cuenta= $request->cuenta;
            $mobiliarios->dia_pago= $request->dia_pago;

        }
        $mobiliarios->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/mobiliarios');
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
         $mobiliarios = Mobiliarios::find($id);
         $mobiliarios->estado=false;
         $mobiliarios->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/mobiliarios');
    }
    
}