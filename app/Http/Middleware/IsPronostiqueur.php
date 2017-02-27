<?php

namespace App\Http\Middleware;

use Closure;

class IsPronostiqueur
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
        if(\Auth::user()->IsPronostiqueur()){
            return $next($request);
        }
        return redirect('/');
    }
}
