<?php

namespace sialas\Http\Controllers;

use Illuminate\Http\Request;
use sialas\User;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;
use DB;
use Redirect;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuarioAc=User::where('estado','=', 1)->get();//estamos guardando dentro de la var todo lo q tiene la taba usuarios
        $usuarioIn=User::where('estado','=', 0)->get();
        return view('user.index',compact('usuarioAc', 'usuarioIn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
         Cajas::create($request->All());
        return redirect('/user')->with('mensaje','Registro Guardado');
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
        $usuario = User::where('id','=',$id)->get();
        return view('User.show',compact('user'));
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
        $usuario=User::find($id);
        return view('user.edit', compact('user'));
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
        $usuario=User::find($id);
        $usuario->fill($request->all());
        $usuario->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=User::find($id);
        $usuario->estado=false;
        $usuario->save();
        Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/user');
    }
    public function darAlta($id)
    {
        $usuario=User::find($id);
        $usuario->estado=true;
        $usuario->save();
        Session::flash('mensaje','Registro dado de Alta');
        return Redirect::to('/user');
    }
}
