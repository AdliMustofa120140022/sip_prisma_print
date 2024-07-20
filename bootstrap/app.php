<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\LaravelIgnition\Facades\Flare;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\admin::class,
            'superadmin' => \App\Http\Middleware\superAdmin::class,
            'user' => \App\Http\Middleware\user::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        Flare::handles($exceptions);
    })->create();
