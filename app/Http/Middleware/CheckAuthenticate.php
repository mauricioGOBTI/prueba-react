<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticate {
    public function handle(Request $request, Closure $next): Response {
        if (!$request->bearerToken()) {
            return response()->json([
                'success' => false,
                'error' => 'Access denied.',
            ]);
        }

        $bearer = $request->bearerToken();
        $bearer = explode('|', $bearer)[1];

        if ($token = DB::table('personal_access_tokens')->where('token', hash('sha256', $bearer))->first()) {
            $user = User::find($token->tokenable_id);
            Auth::login($user);
            return $next($request);
            
        }

        return response()->json([
            'success' => false,
            'error' => 'Access denied.',
        ]);
    }
}
