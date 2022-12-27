<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Teacher
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
        // * role_id admin=1 role_id teacher=2
        // todo logic, jika yang login bukan admin dan teacher, maka pindahkan ke halaman 404
        if (Auth::user()->role_id != 1 && Auth::user()->role_id != 2) {
            abort(404);
        }
        return $next($request);
    }
}