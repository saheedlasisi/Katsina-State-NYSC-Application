<?php

namespace App\Http\Middleware;

use Closure;

class SaedMasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='saedmaster')

    {

      if (!auth()->guard($guard)->check()) {

        return redirect('/saedmaster/login');
      }
        return $next($request);
    }
}
