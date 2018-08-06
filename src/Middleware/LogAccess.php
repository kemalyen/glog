<?php

namespace Gazatem\Glog\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null, $needsAll = false)
    {
        return $next($request);
    }
}
