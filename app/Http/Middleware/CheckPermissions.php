<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->is('users*') && !empty(Auth::user()->permissions->find(1))){
            return $next($request);
        }elseif($request->is('signs*') && !empty(Auth::user()->permissions->find(2))){
            return $next($request);
        }elseif($request->is('reportcards*') && !empty(Auth::user()->permissions->find(3))){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
