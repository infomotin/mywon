<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioNavigation extends Model
{
    protected $table = 'portfolio_navigations';
    protected $guarded = [];
    public function portfolio() {
        return $this->belongsTo(PortfolioPopup::class);
    }
}
