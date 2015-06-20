<?php

namespace App\Http\Middleware;

use Sentry;
use Closure;

class SentryNotCurrentUser
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
        $user = Sentry::getUser();
        $routeID = $request->route()->parameters()['profiles'];

        if ($user->id != $routeID) {
            return redirect()->back();
        }

        return $next($request);
    }
}
