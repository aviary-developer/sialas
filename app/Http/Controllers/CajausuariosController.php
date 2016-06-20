<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\User;
use sialas\Descuentoaportes;
use sialas\Rentas;
use sialas\Planillas;

class CajausuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios=User::buscar("",1);
        $activos= Descuentoaportes::buscar("",null);
        $renta= new Rentas();
        return view('cajausuarios.create',compact('usuarios','activos','renta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arreglo=$request['arreglo'];
        if(count($arreglo)>0){
          $cp=Planillas::count();
          $date = Carbon::now();
          $date = $date->format('d-m-Y');
          /*Planillas::create([
            'id'=>$cp+1,
            'fecha'=>$date,
          ]);*/
          $cdp=Datosplanillas::count();
          for ($i=0; $i < count($arreglo); $i++) {
            $arreglou[$i]=unserialize($arreglo[$i]));
            /*Datosplanillas::create([
              'id'=>$cdp+$i+1,
              'planilla_id'=>$cp+1,
              'user_id'=>$arreglou[$i][0],
            ]);*/
          }
        }
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
