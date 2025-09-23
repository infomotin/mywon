<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioPopup;
class PortfolioPopupContorller extends Controller
{
    public function index() {
        $portfolios = PortfolioPopup::with('portfolios','galleries','navigation')->get();
        return view('backend.portfolio.popup.index', compact('portfolios'));
    }
}
