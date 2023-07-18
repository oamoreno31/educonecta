<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {

        if (!$request->user() || $request->user()->role != 'admin') {
            abort(403, 'Acceso denegado.');
            // return Redirect::route('error_403');
        }
        return $next($request);
    }
}
