<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JetstreamRoutes
{
    public function handle(Request $request, Closure $next)
    {
        config(['jetstream-page' => true]);

        return $next($request);
    }
}
