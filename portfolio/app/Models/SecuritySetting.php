<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecuritySetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function firstOrCreateSettings()
    {
        return self::firstOrCreate([], [
            'captcha_enabled' => false,
            'brute_force_enabled' => false,
            'login_log_enabled' => false,
            'two_factor_enabled' => false,
        ]);
    }
}
