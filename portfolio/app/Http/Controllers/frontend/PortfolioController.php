<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function details($id)
    {
        $portfolio = Portfolio::with('services')->findOrFail($id);
        return view('frontend.portfolio_details', compact('portfolio'));
    }
}
