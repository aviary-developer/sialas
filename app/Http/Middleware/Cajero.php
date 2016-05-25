<?php

namespace sialas\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Closure;

class Cajero
{
    protected $Auth;
    public function __construct(Guard $auth){
        $this->auth =$auth;
    }

    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->tipo) {
            case '1':
                return view('welcome');
                break;

            case '2':
                return view('welcome');
                break;

            case '3':
                return view('welcome');
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
