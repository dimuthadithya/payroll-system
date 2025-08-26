<?php

use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\EmployeeOrHigher;
use App\Http\Middleware\HRAccess;
use App\Http\Middleware\RoleHierarchy;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'check.role' => CheckRole::class,
            'admin.only' => AdminOnly::class,
            'hr.access' => HRAccess::class,
            'employee.or.higher' => EmployeeOrHigher::class,
            'role.hierarchy' => RoleHierarchy::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {})->create();
