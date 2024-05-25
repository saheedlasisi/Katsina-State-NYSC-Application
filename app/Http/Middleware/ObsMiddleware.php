<?php

namespace App\Http\Middleware;

use Closure;

class ObsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='obs')

    {

      if (!auth()->guard($guard)->check()) {

        return redirect('/obs/login');
      }
        return $next($request);
    }
}
