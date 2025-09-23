<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioGallery extends Model
{
    protected $table = 'portfolio_galleries';
    protected $guarded = [];
    public function portfolio() {
        return $this->belongsTo(PortfolioPopup::class);
    }
}
