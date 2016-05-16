<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Response;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use sialas\Categorias;
use sialas\Marcas;
use sialas\Productos;

use Redirect;
use View;
use Session;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $state = $request->get('estado');
        $name = $request->get('nombre');
        $productosActivas= Productos::buscar($name,$state);
        return view('productos.index',compact('productosActivas','productosInactivas','state','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c= Categorias::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Marcas::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('productos.create',compact('c','m'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesProductos/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
       // Cambiar de tamaño
       $image->resize(240,200);
       // Guardar
       $image->save($path.'ProductoSialas_'.$file->getClientOriginalName());
       //Guardamos nombre y nombreOriginal en la BD
       $productos = new Productos();
       $productos->nombre = Input::get('nombre');
       $productos->marca_id = $request['marca_id'];
       $productos->categoria_id = $request['categoria_id'];
       $productos->nombre_img = $file->getClientOriginalName();
       $productos->save();
       $idproducto = $productos->id;
       return redirect::to('/presentaciones/'.$idproducto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $c = Productos::find($id);
        //return view('Categorias.show',compact('categorias'));
        return View::make('Productos.show')->with('c', $c);
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
        $productos = Productos::find($id);
        $c= Categorias::where('estado','=', 1)->orderBy('nombre','asc')->get();
        $m= Marcas::where('estado','=', 1)->orderBy('nombre','asc')->get();
        return view('Productos.edit',compact('productos','c','m'));
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
        $productos = Productos::find($id);

        $file = Input::file('nombre_img');
       //Creamos una instancia de la libreria instalada   
       $image = \Image::make(\Input::file('nombre_img'));
       //Ruta donde queremos guardar las imagenes
       $path = public_path().'/imagenesProductos/';
       // Guardar Original
       $image->save($path.$file->getClientOriginalName());
       // Cambiar de tamaño
       $image->resize(240,200);
       // Guardar
       $image->save($path.'ProductoSialas_'.$file->getClientOriginalName());
       //Guardamos nombre y nombreOriginal en la BD
       $productos->nombre = Input::get('nombre');
       $productos->marca_id = $request['marca_id'];
       $productos->categoria_id = $request['categoria_id'];
       $productos->nombre_img = $file->getClientOriginalName();
       $productos->save();

       Session::flash('mensaje','¡Registro Actualizado!');
       return redirect::to('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Productos::find($id);
         $productos->estado=false;
         $productos->save();
         Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/productos');
    }
    public function darAlta($id){
         $productos = Productos::find($id);
         $productos->estado=true;
         $productos->save();
         Session::flash('mensaje','Registro dado de Alta');
         return Redirect::to('/productos');
    }
}
