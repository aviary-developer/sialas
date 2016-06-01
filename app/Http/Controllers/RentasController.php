<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Rentas;

class RentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pago=array("Mensual","Quincenal","Semanal");
        $tramo_m=array("I","II","III","IV");
        $desde_m=array("0.01","472.01","895.25","2038.11");
        $hasta_m=array("472.00","895.24","2038.10","0");
        $porcentaje_m=array("0","10","20","30");
        $exceso_m=array("0","472.00","895.24","2038.10");
        $cuota_m=array("0","17.67","60.00","288.57");

        $tramo_q=array("I","II","III","IV");
        $desde_q=array("0.01","236.01","447.63","1019.06");
        $hasta_q=array("236.00","447.62","1019.05","0");
        $porcentaje_q=array("0","10","20","30");
        $exceso_q=array("0","236.00","447.62","1019.05");
        $cuota_q=array("0","8.83","30.00","144.28");

        $tramo_s=array("I","II","III","IV");
        $desde_s=array("0.01","118.01","223.82","509.53");
        $hasta_s=array("118.00","223.81","509.52","0");
        $porcentaje_s=array("0","10","20","30");
        $exceso_s=array("0","118.00","223.81","509.52");
        $cuota_s=array("0","4.42","15.00","72.14");

        $contador=Rentas::count();
        if($contador<1){
          for($i=0;$i<4;$i++){
            Rentas::create([
              'pago' => $pago[0],
              'tramo' => $tramo_m[$i],
              'desde' => $desde_m[$i],
              'hasta' => $hasta_m[$i],
              'porcentaje' => $porcentaje_m[$i],
              'exceso' => $exceso_m[$i],
              'cuota' => $cuota_m[$i]
            ]);
            Rentas::create([
              'pago' => $pago[1],
              'tramo' => $tramo_q[$i],
              'desde' => $desde_q[$i],
              'hasta' => $hasta_q[$i],
              'porcentaje' => $porcentaje_q[$i],
              'exceso' => $exceso_q[$i],
              'cuota' => $cuota_q[$i]
            ]);
            Rentas::create([
              'pago' => $pago[2],
              'tramo' => $tramo_s[$i],
              'desde' => $desde_s[$i],
              'hasta' => $hasta_s[$i],
              'porcentaje' => $porcentaje_s[$i],
              'exceso' => $exceso_s[$i],
              'cuota' => $cuota_s[$i]
            ]);
          }
        }
        $renta=Rentas::orderBy('id')->get();
        return view('rentas.index',compact('renta'));

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
