<?php

namespace App\Http\Middleware;

use Closure;
use Sentry;

class SentryStandardUser
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
        $users = Sentry::findGroupByName('Users');

        if (!$user->inGroup($users)) {
            return redirect('login');
        }
        return $next($request);
    }
}
