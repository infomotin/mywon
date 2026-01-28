<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\SecuritySetting;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting = SecuritySetting::firstOrCreateSettings();

        // Check if 2FA is enabled and user is authenticated
        if ($setting->two_factor_enabled && Auth::check()) {
            // If session does not have '2fa_verified' key
            if (!session()->has('2fa_verified')) {
                
                // If we are already on the 2fa route or logout route, allow it
                if ($request->routeIs('2fa.*') || $request->routeIs('admin.logout') || $request->routeIs('logout')) {
                    return $next($request);
                }

                // Otherwise redirect to 2fa verification page
                return redirect()->route('2fa.index');
            }
        }

        return $next($request);
    }
}
