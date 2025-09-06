<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        // Check if user is logged in and has the required permission
        if (auth()->check() && auth()->user()->hasPermission($permission)) {
            return $next($request);
        }

        // Abort if unauthorized
        abort(403, 'Unauthorized Access');
    }
}
