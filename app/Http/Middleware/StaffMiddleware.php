<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Allow both staff AND admin to access staff routes
        // Admin should be able to see everything staff can see
        if (!$user || !in_array($user->role, ['staff', 'admin'])) {
            abort(403, 'Access denied. Staff only.');
        }

        return $next($request);
    }
}