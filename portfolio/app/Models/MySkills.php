<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySkills extends Model
{
    protected $table = 'my_skills';
    protected $fillable = ['name', 'icon', 'level', 'order'];
}
