<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        if (Auth::check()) {
            $user = Auth()->user();
            // $user->status  &&
            if ($user->ev  && $user->sv  && $user->tv) {
                return $next($request);
            } else {
                return redirect()->route('user.authorization');
            }
        }
    }
}
