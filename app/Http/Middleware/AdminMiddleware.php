<?php

namespace App\Http\Middleware;

use App\Actions\Settings\GetSettingsAction;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        GetSettingsAction::admin();
        if (Auth::check() && (Auth::user()->role_id === 3 || Auth::user()->role_id === 2)){
            return $next($request);
        }
        abort(404);
    }
}
