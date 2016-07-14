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
use sialas\Datosplanillas;
use sialas\Valoresplanillas;
use sialas\Cajausuarios;
use sialas\Cajas;

class CajausuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fecha = $request->get('fecha');
        $planillas=Planillas::buscar($fecha);
        return view('cajausuarios.index',compact('planillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $salario = $request->get('salario');
        if($salario == null){
          $salario = 1;
        }
        $usuarios=User::buscars("",1,$salario);
        $activos= Descuentoaportes::buscarv("",null);
        $renta= new Rentas();
        return view('cajausuarios.create',compact('usuarios','activos','renta','salario'));
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
          Planillas::create([
            'id'=>$cp+1,
            'fecha'=>$date,
          ]);
          $descap[0]=unserialize($arreglo[0]);
          $cdp=Datosplanillas::count();
          for ($i=1; $i < count($arreglo); $i++) {
            echo "<br>";
            $arreglou[$i]=unserialize($arreglo[$i]);
            Datosplanillas::create([
              'id'=>$cdp+$i,
              'planilla_id'=>$cp+1,
              'user_id'=>$arreglou[$i][0],
              'salario_neto'=>Planillas::valorneto($descap[0],$arreglou[$i]),
              'valor_renta'=>$arreglou[$i][2],
            ]);
            $cvp=Valoresplanillas::count();
            for ($b=3; $b < count($arreglou[$i]); $b++) {
              Valoresplanillas::create([
                'id'=>$cvp+$b-1,
                'dato_id'=>$cdp+$i,
                'desp_id'=>$descap[0][$b-3],
                'monto'=>$arreglou[$i][$b],
              ]);
            }
          }
        }

        return redirect('/cajausuarios')->with('mensaje','Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planilla=Planillas::find($id);
        $ca=new Cajausuarios();
        $datos=Datosplanillas::where('planilla_id',$id)->get();

        return view('cajausuarios.show',compact('planilla','datos','ca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planilla=Planillas::find($id);
        $cajas=Cajas::buscar("",null);

        return view('cajausuarios.pago',compact('planilla','cajas'));
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
        $request['planilla_id']=$id;
        Cajausuarios::create($request->all());

        $p=Planillas::find($id);
        $p['estado_pagado']=true;
        $p->save();
        return redirect('/cajausuarios')->with('mensaje','Registro Guardado');
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
