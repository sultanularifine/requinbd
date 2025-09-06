<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
   public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if($role === 'executive' && !$user->isAdminOrExecutive()) {
            return abort(403);
        }

        if($role === 'intern' && !$user->isIntern()) {
            return abort(403);
        }

        return $next($request);
    }
}
