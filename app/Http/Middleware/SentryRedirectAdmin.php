<?php

namespace App\Http\Middleware;

use Closure;
use Sentry;

class SentryRedirectAdmin
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
        if (Sentry::check()) {
            $user = Sentry::getUser();
            $admin = Sentry::findGroupByName('Admins');

            if ($user->inGroup($admin)) {
                return redirect()->intended('admin');
            }
        }
        return $next($request);
    }
}
