<?php

namespace sialas\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class Vendedor
{
    protected $Auth;
    public function __construct(Guard $auth){
        $this->auth =$auth;
    }

    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->tipo) {
            case '1':
                //Acceso administrador
                break;


            case '2':
                //Acceso gerente
                break;

            case '3':
                //Acceso vendedor
                break;

            case '4':
                //Acceso cajero
                break;
            
            default:
                return Redirect('/'); //aqui
                break;
        }
        return $next($request);
    }
}
