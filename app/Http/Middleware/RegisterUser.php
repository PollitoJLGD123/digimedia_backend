<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RegisterUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            if( in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE']))
        {
            $user = Auth::user();

            UserAction::create([
                'usuario_id' => $user?->id,
                'usuario_email' => $user?->email,
                'ip' => $request->ip(),
                'metodo' => $request->method(),
                'url' => $request->fullUrl(),
                'datos' => json_encode($request->except(['password', '_token'])),
                'user_agent' => $request->userAgent(),
                'created_at' => now()
            ]);
        }
        }catch(\Exception $ex){
            Log::error("Error del sistema: ". $ex);
        }finally{
            return $next($request);
        }
    }
}
