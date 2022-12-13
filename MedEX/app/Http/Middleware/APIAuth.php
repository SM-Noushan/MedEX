<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;

class APIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return '$token';
        $token = $request->header('Authorization');
        $token = json_decode($token);
        $check_token = Token::where('api_token',  Hash('sha256', $token->access_token))->where('expired_at', null)->first();
        if($check_token){
            return $next($request);
        }
        return response ('Invalid Token', 401);
    }
}
