<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AuthApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = User::where('api_token', $request->get('api_token'))->first();
        if ($token) {
            return $next($request);
         }

        return response()->json([
            'status' => 'Le jeton API est manquant ou invalide.'
        ]);
    }
}
