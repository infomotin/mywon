<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPopup extends Model
{
    protected $table = 'portfolio_popups';
    protected $guarded = [];
    public function galleries() {
        return $this->hasMany(PortfolioGallery::class);
    }

    public function navigation() {
        return $this->hasOne(PortfolioNavigation::class);
    }
    public function portfolios() {
        return $this->belongsTo(Portfolio::class);
    }
}
