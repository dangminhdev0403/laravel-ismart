<?php

use App\Http\Middleware\CanCheckOut;
use App\Http\Middleware\CheckRoleAllMiddleware;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\NoCache;
use App\Http\Middleware\SaveCart;
use App\Http\Middleware\VerifyEmailMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(

            [
                'delcache' => NoCache::class,
                'savecart' => SaveCart::class,
                'checkout' => CanCheckOut::class,
                'checkrole' => CheckRoleMiddleware::class,
                'checkrole-admin' => CheckRoleAllMiddleware::class,
                'verifed-email' => VerifyEmailMiddleware::class
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
