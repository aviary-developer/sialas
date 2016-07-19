<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Http\Requests\BancosRequest;
use sialas\Bancomobiliarios;
use sialas\Bancos;
use sialas\Mobiliarios;
use Redirect;
use Session;
use View;
use Carbon\Carbon;
use sialas\Bitacoras;

class BancomobiliariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $bancomobiliarios=Bancomobiliarios::orderBy('created_at','asc')->paginate(8);
        return view('Bancomobiliarios.index',compact('bancomobiliarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $c= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Mobiliarios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Bancomobiliarios.create',compact('c','m'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BancomobiliariosRequest $request)
    {   Bitacoras::bitacora("Registro nuevo pago de mobiliario");
        Bancomobiliarios::create($request->All());
        return redirect('/bancomobiliarios')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $c = Bancomobiliarios::find($id);

        return View::make('Bancomobiliarios.show')->with('c', $c);
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
        $bancomobiliarios =Bancomobiliarios::find($id);
        $c= Bancos::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Mobiliarios::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Bancomobiliarios.edit',compact('bancomobiliarios','c','m'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BancomobiliariosRequest $request, $id)
    {
        Bitacoras::bitacora("Modificación datos pago  de mobiliario");
        $bancomobiliarios = Bancomobiliarios::find($id);
        $bancomobiliarios->fill($request->All());
        $bancomobiliarios->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/bancomobiliarios');
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
