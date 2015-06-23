<?php

namespace App\Http\Middleware;

use Closure;
use Sentry;

class SentryAdminUser
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
        $admin = Sentry::findGroupByName('Admins');

        if (!$user->inGroup($admin)) {
            return redirect('login');
        }
        return $next($request);
    }
}
