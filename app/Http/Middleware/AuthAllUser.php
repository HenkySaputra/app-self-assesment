<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAllUser
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
        if($request->session()->has('userAuth')){
            $user = $request->session()->get('userAuth');
            if ($user['roleId'] == '1') {
                return $next($request);
            }
            else if($user['roleId'] =='2' ) {
                return $next($request);
            }
            else if($user['roleId'] == '3') {
                return $next($request);
            }
        }
        return redirect()->route('proses_login')->withErrors(['Please login first']);
    }
}
