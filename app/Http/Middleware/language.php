<?php

namespace App\Http\Middleware;

use Closure;

class language
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
        dd($request->server('HTTP_ACCEPT_LANGUAGE'));
        return $next($request);
    }
}
