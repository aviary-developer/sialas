<?php

namespace sialas\Http\Controllers;
use sialas\Bitacoras;
use Illuminate\Http\Request;
use sialas\User;
use sialas\Http\Requests;
use sialas\Http\Requests\UsersRequest;
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
    public function index(Request $request)
    {
        //
        $state = $request->get('estado');
        $name = $request->get('name');
        $usuarioAc= User::buscar($name,$state);
        return view('user.index',compact('usuarioAc','usuarioInac','state','name'));
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
    public function store(UsersRequest $request)
    {
        Bitacoras::bitacora("Registro de nuevo usuario: ".$request['nom_usuario']);
        $request['password']=bcrypt($request['password']);
         User::create($request->All());
        return redirect('/users')->with('mensaje','Registro Guardado');
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
        $user = User::find($id);

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
        return view('User.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   Bitacoras::bitacora("Modificación de usuario: ".$request['nom_usuario']);
        $usuario=User::find($id);
        if(!empty($request['password'])){
            $request['password']=bcrypt($request['password']);
        }else{
            $request['password']=$usuario['password'];
        }
        $usuario->fill($request->all());
        $usuario->save();
        Session::flash('mensaje','¡Registro Actualizado!');
        return Redirect::to('/users');
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
        Bitacoras::bitacora("Usuario enviado a papelera: ".$usuario['nom_usuario']);
        Session::flash('mensaje','Registro dado de Baja');
         return Redirect::to('/users');
    }
    public function darAlta($id)
    {
        $usuario=User::find($id);
        $usuario->estado=true;
        $usuario->save();
        Bitacoras::bitacora("Uusuario activado: ".$usuario['nom_usuario']);
        Session::flash('mensaje','Registro dado de Alta');
        return Redirect::to('/users');
    }
}
