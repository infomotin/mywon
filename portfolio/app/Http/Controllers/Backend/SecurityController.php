<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SecuritySetting;
use App\Models\LoginLog;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index()
    {
        $setting = SecuritySetting::firstOrCreateSettings();
        $loginLogs = LoginLog::with('user')->latest()->limit(50)->get();
        return view('backend.admin.security.index', compact('setting', 'loginLogs'));
    }

    public function update(Request $request)
    {
        $setting = SecuritySetting::firstOrCreateSettings();
        
        $setting->update([
            'captcha_enabled' => $request->has('captcha_enabled'),
            'brute_force_enabled' => $request->has('brute_force_enabled'),
            'login_log_enabled' => $request->has('login_log_enabled'),
            'two_factor_enabled' => $request->has('two_factor_enabled'),
        ]);

        return back()->with('success', 'Security settings updated successfully.');
    }
}
