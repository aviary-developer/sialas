<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Productos;
use sialas\Ventas;
use sialas\Users;
use sialas\Clientes;
use sialas\Presentaciones;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
       $state = $request->get('estado');
       $cajasActivas= Ventas::buscar($state);
       return view('ventas.index',compact('cajasActivas','cajasInactivas','state'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=Clientes::where('estado',true)->orderBy('nombre')->get();
        $productos=Productos::where('estado',true)->orderBy('nombre')->get();
        return view('Ventas.create',compact('clientes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Ventas;
        $venta->producto_id = $request->proveedorVenta;
        $venta->usuario_id = 1;
        $venta->save();
        return redirect('/ventas')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $c=Ventas::find($id);
      return view('Ventas.show',compact('Ventas','productos'));
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
    public function llenadoPresentacionesVenta($nombre){
      $producto=Productos::where('nombre',$nombre)->get();
      foreach ($producto as $p) {
        $idProducto=$p->id;
      }
      $presentaciones=Presentaciones::where('producto_id',$idProducto)->get();
      return Response::json($presentaciones);
    }
}
