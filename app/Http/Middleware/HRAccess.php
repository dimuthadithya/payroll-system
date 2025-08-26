<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HRAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        // HR can access HR routes, Admin can access everything
        if (!($user->isHR() || $user->isAdmin())) {
            return redirect('/dashboard')->with('error', 'HR access required');
        }
        return $next($request);
    }
}
