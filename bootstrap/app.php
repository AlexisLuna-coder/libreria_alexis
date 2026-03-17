<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // REGISTRAR TODOS LOS MIDDLEWARE 
        $middleware-> alias([
            'auth' => App\Http\Middleware\VerificaUsuario::class, //Añadimos RUTA
            'admin' => App\Http\Middleware\AdminMiddleware::class, //Añadimos RUTA para ADMIN
            
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
