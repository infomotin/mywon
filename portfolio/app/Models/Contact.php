<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'status',
        'services_cat_id',
    ];

    public function services()
    {
        return $this->belongsTo(Services::class, 'services_cat_id', 'id');
    }
}
