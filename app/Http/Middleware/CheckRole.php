<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'admin' && auth()->user()->role != 'admin' ) {
            abort(403);
        }
        if ($role == 'user' && auth()->user()->role != 'user' ) {
            abort(403);
        }
        if ($role == 'guest' && auth()->user()->role != 'guest' ) {
            abort(403);
        }
        return $next($request);
    }
}
