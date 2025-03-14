<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No autorizado'
            ], 401);
        }

        // verificar que el token tiene las capacidades (roles) requeridas
        $tokenAbilities = $request->user()->currentAccessToken()->abilities;
        
        foreach ($roles as $role) {
            if (in_array($role, $tokenAbilities)) {
                return $next($request);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'No tiene los permisos necesarios para acceder a este recurso'
        ], 403);
    }
}
