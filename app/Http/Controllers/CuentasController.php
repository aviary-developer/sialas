<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=array("1","2","3","4","5","6","7","8","9","10"
      "11","12","13","14","15","16","17","18","19","20",
      "21","22","23","24","25","26","27","28","29","30"
      "31","32","33","34","35","36","37","38","39","40"
      "41","42");
      $codigo=array("","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","");
      $cuenta=array("","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","");
      $tipo_saldo=array("","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","");
      $depende_de=array("","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","","","","","","","","","",
      "","");
        return view('cuentas.index');
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
