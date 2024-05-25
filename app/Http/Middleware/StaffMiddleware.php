<?php

namespace App\Http\Middleware;

use Closure;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='staff')

    {

      if (!auth()->guard($guard)->check()) {

        return redirect('/staff/login');
      }
        return $next($request);
    }
}
