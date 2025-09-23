<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    protected $guarded = [];

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Services::class, 'services_cat_id', 'id');
    }
    
    public function popups(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(PortfolioPopup::class);
    }

}
