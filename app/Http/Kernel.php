<?php

namespace sialas\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \sialas\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \sialas\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \sialas\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \sialas\Http\Middleware\RedirectIfAuthenticated::class,

        //middleware para validacion
        'administrador' => \sialas\Http\Middleware\Administrador::class,
        'gerente' => \sialas\Http\Middleware\Gerente::class,
        'vendedor' => \sialas\Http\Middleware\Vendedor::class,
        'cajero' => \sialas\Http\Middleware\Cajero::class,
    ];
}
