<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Portfolio;
use App\Models\Services;

class PortfolioContorller extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('backend.admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        $services= Services::all();
        return view('backend.admin.portfolio.create', compact('services'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
            'description' => 'required',
            'services_cat_id' => 'required',
            'url' => 'required',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->subtitle = $request->subtitle;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/portfolio/', $filename);
            $portfolio->image = $filename;
        }

        $portfolio->description = $request->description;
        $portfolio->services_cat_id = $request->services_cat_id;
        $portfolio->url = $request->url;
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $services= Services::all();
        return view('backend.admin.portfolio.edit', compact('portfolio', 'services'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
            'description' => 'required',
            'services_cat_id' => 'required',
            'url' => 'required',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->subtitle = $request->subtitle;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/portfolio/', $filename);
            $portfolio->image = $filename;
        }

        $portfolio->description = $request->description;
        $portfolio->services_cat_id = $request->services_cat_id;
        $portfolio->url = $request->url;
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully');
    }
}
