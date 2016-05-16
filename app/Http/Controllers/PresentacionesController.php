<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Presentaciones;
use Redirect;
use Session;
use View;

class PresentacionesController extends Controller
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
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
      $nombre = Presentaciones::nombreProducto($producto);
      $presentacion = Presentaciones::where('producto_id','=',$producto)->orderBy('equivale')->paginate(8);
      return view('Presentaciones.show',compact('presentacion','producto','nombre'));
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
    //Nueva función
    public function crear($producto)
    {
      $nombre = Presentaciones::nombreProducto($producto);
        return view('Presentaciones.crear',compact('producto','nombre'));
    }

    public function guardar(Request $request, $producto)
    {
        $id = Presentaciones::all()->count();
        $pres = new Presentaciones;
        $pres->id = $id;
        $pres->nombre = $request->nombre;
        $pres->equivale = $request->equivale;
        $pres->ganancia = $request->ganancia;
        $pres->producto_id = $producto;
        $pres->save();
        return redirect('/presentaciones/'.$producto)->with('mensaje','Registro Guardado');
    }
}
