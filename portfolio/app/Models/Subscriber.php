<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'subscribed_at', 'is_active', 'token'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscriber) {
            $subscriber->token = \Illuminate\Support\Str::random(32);
        });
    }
}
