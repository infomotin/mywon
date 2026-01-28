<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecuritySetting;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.two_factor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|integer',
        ]);

        $sessionCode = session('2fa_code');

        if ($request->code == $sessionCode) {
            session(['2fa_verified' => true]);
            session()->forget('2fa_code');
            return redirect()->intended(route('dashboard', absolute: false));
        }

        return back()->withErrors(['code' => 'The provided code is incorrect.']);
    }
}
