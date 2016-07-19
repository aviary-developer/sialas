<?php

namespace sialas\Http\Controllers;
use sialas\Bitacoras;
use Illuminate\Http\Request;
use Mail;
use Auth;
use DB;
use Session;
use Redirect;
use Crypt;
use sialas\User;
use sialas\Http\Requests;
use sialas\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        if(Auth::attempt(['name'=>$request['name'],'password'=>$request['password']])){
            return view('welcome');
            Bitacoras::bitacora("Ingreso al sistema");
        }else{
            return redirect('/');
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

    public function logout(){
        Bitacoras::bitacora("Salida del sistema");
        Auth::logout();
        return Redirect('/');
    }
    public function pass(){
      return view('auth.mail');
    }
    public function correo(Request $request){
      $count=0;
        $usuario= User::where('email', '=',$request['email'])->get();
        foreach ($usuario as $us) {
            $u=$us->name;
            $c=$us->password;
            $count=$count+1;
        }

        if($count==1){
          $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for($i=0;$i<12;$i++)
        {
            $cad .= substr($str,rand(0,62),1);
        }

        echo $u;

       DB::table('users')
            ->where('email',$request['email'])
            ->update([
            'password'=>bcrypt($cad),
            ]);

        $mensaje='Su usuario es: '.$u.' Su contraseña es :'.$cad;

        try {
        Mail::raw($mensaje,function($msj) use ($request){
            $msj->subject('Nueva contraseña en Western Bluebird');
             try {
            $msj->to($request['email']);
          } catch (\Swift_RfcComplianceException $e) {
            return redirect('/')->with('error','Lo sentimos el correo no pudo ser enviado');
          }
        });
      }catch (\Swift_TransportException $e) {
        return redirect('/')->with('error','Revise el acceso a internet');
      }

        return redirect('/')->with('mensaje','Usuario y nueva contraseña enviados');
        }
        else{
            return redirect('/')->with('error','Ningún usuario registrado con ese correo');
        }

    }
}
