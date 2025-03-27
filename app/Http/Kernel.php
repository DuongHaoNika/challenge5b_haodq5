<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'teacher_auth' => [
            \App\Http\Middleware\CheckAuthenticated::class,
            \App\Http\Middleware\TeacherOnly::class,
        ],
        'student_auth' => [
            \App\Http\Middleware\CheckAuthenticated::class,
            \App\Http\Middleware\StudentOnly::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\CheckAuthenticated::class,
    ];
}