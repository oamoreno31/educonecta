<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {
        printf (property_exists($request, 'role'));

        if (!$request->user() || $request->user()->role != 'admin') {
            abort(403, 'Acceso denegado.');
        }
        return $next($request);
    }
}
