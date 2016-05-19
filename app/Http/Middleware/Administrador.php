<?php

namespace sialas\Http\Middleware;

use Closure;

class Administrador
{
    protected $Auth;
    public function __construct(Guard $auth){
        $this->auth =$auth;
    }

    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->tipo) {
            case '1':
                //
                break;

            case '2':
                return view('welcome');
                break;

            case '3':
                return view('welcome');
                break;

            case '4':
                return view('welcome');
                break;
            
            default:
                return Redirect('/'); //aqui
                break;
        }
        return $next($request);
    }
}
