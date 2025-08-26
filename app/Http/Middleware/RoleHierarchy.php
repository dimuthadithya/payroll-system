<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleHierarchy
{
    protected array $roleHierarchy = [
        'employee' => 1,
        'hr' => 2,
        'admin' => 3,
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $minimumRole): Response
    {


        $user = Auth::user();
        $userRole = strtolower($user->role);

        $requiredLevel = $this->roleHierarchy[$minimumRole] ?? 0;
        $userLevel = $this->roleHierarchy[$userRole] ?? 0;

        if ($userLevel < $requiredLevel) {
            abort(403, "Access denied. Minimum role required: {$minimumRole}");
        }
        return $next($request);
    }
}
