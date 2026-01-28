<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\SecuritySetting;
use App\Models\LoginLog;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $setting = SecuritySetting::firstOrCreateSettings();
        $captcha_question = null;

        if ($setting->captcha_enabled) {
            $num1 = rand(1, 10);
            $num2 = rand(1, 10);
            session(['captcha_answer' => $num1 + $num2]);
            $captcha_question = "$num1 + $num2";
        }

        return view('auth.login', compact('captcha_question'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Login Logging
        $setting = SecuritySetting::firstOrCreateSettings();
        if ($setting->login_log_enabled) {
            LoginLog::create([
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        if ($setting->two_factor_enabled) {
            $code = rand(100000, 999999);
            session(['2fa_code' => $code]);
            
            try {
                 \Illuminate\Support\Facades\Mail::to(Auth::user()->email)->send(new \App\Mail\TwoFactorCode($code));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('2FA Mail Error: ' . $e->getMessage());
            }
            
            return redirect()->route('2fa.index');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
