<?php

namespace sialas\Http\Middleware;

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
                //
                break;


            case '2':
                //
                break;

            case '3':
                //
                break;

            case '4':
                //
                break;
            
            default:
                return Redirect('/'); //aqui
                break;
        }
        return $next($request);
    }
}
