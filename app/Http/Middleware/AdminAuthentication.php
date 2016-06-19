<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $groupId)
    {
        if($request->user() == null || !$request->user()->hasGroup($groupId)) {
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
