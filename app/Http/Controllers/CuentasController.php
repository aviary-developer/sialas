<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;

use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Cuentas;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=array("1","2","3","4","5","6","7","8","9","10",
      "11","12","13","14","15","16","17","18","19","20",
      "21","22","23","24","25","26","27","28","29","30",
      "31","32","33","34","35","36","37","38","39","40",
      "41","42");
      $codigo=array("1","11","1101","1102","1103","110301","110302","1104","110401","110402",
      "1105","12","1201","1202","1203","1204","2","21","2101","2102",
      "2103","2104","2105","2106","22","2201","3","31","32","33",
      "4","41","42","43","44","5","51","52","53","54",
      "55","56");
      $cuenta=array("Activo","Activo Corriente","Efectivo","Bancos","Clientes","Documentos por cobrar","Cuentas por cobrar","Inventario","Inventario comercial","Inventario industrial",
      "IVA Crédito Fiscal","Activo no Corriente","Propiedades, planta y equipo","Equipo y Mobiliario","Papelería y útiles","Depreciación Acumulada","Pasivo","Pasivo Corriente","Proveedores","Deudores diversos",
      "Acreedores diversos","Impuestos por pagar","Salarios por pagar","IVA Débito Fiscal","Pasivo no Corriente","Préstamos bancarios a largo plazo","Patrimonio","Utilidad o Perdida del Ejercicio","Reserva legal","Capital Social",
      "Ingresos","Ventas","Devolución sobre venta","Descuento sobre venta","Otros ingresos","Egresos","Compras","Devolución sobre compra","Descuento sobre compra","Gastos administrativos",
      "Gastos de ventas","Gastos financieros");
 
      $tipo_saldo=array("Deudor","Deudor","Deudor","Deudor","Deudor","Deudor","Deudor","Deudor","Deudor","Deudor",
      "Deudor","Deudor","Deudor","Deudor","Deudor","Acreedor","Acreedor","Acreedor","Acreedor","Acreedor",
      "Acreedor","Acreedor","Acreedor","Acreedor","Acreedor","Acreedor","Acreedor","Acreedor","Acreedor","Acreedor",
      "Acreedor","Acreedor","Deudor","Deudor","Acreedor","Deudor","Deudor","Acreedor","Acreedor","Deudor",
      "Deudor","Deudor");
      $depende_de=array("0","1","2","2","2","5","5","2","8","8",
      "2","1","12","12","12","12","0","17","18","18",
      "18","18","18","18","17","25","0","27","27","27",
      "0","31","31","31","31","0","36","36","36","36",
      "36","36");


      $contador=Cuentas::count();
      if($contador<1){
     for($i=0;$i<42;$i++){
        Cuentas::create([
          'id' => $id[$i],
          'codigo' => $codigo[$i],
          'cuenta' => $cuenta[$i],
          'tipo_saldo' => $tipo_saldo[$i],
          'depende_de' => $depende_de[$i]
          ]);
      }
      }
        //return view('cuentas.index');
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
