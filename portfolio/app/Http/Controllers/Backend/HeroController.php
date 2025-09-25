<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hero;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::all();
        return view('backend.admin.hero.index', compact('hero'));
    }
    //create
    public function create()
    {
        return view('backend.admin.hero.create');
    }
    //hero.store
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'facebook' => 'required',
        //     'twitter' => 'required',
        //     'instagram' => 'required',
        //     'linkedin' => 'required',
        //     'YOE' => 'required',
        //     'CV' => 'required|file|mimes:pdf|max:2048',
        //     'HC' => 'required|file|mimes:pdf|max:2048',
        //     'Location' => 'required',
        //     'github' => 'required',
        //     'problem_statement' => 'required',
        //     'problem_statement_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        //store
        $hero = new Hero();
        $hero->name = $request->name;
        $hero->title = $request->title;
        $hero->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->image = $filename;
        }

        $hero->facebook = $request->facebook;
        $hero->twitter = $request->twitter;
        $hero->instagram = $request->instagram;
        $hero->linkedin = $request->linkedin;
        $hero->YOE = $request->YOE;

        if($request->hasFile('CV'))
        {
            $file = $request->file('CV');
            $filename = time()+1 . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->CV = $filename;
        }
        if($request->hasFile('HC'))
        {
            $file = $request->file('HC');
            $filename = time()+1 . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->HC = $filename;
        }
        $hero->Location = $request->Location;
        $hero->github = $request->github;
        $hero->problem_statement = $request->problem_statement;

        if($request->hasFile('problem_statement_image'))
        {
            $file = $request->file('problem_statement_image');
            $filename = time()+1 . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->problem_statement_image = $filename;
        }

        $hero->save();
        //notification
        $request->session()->flash('success', 'Hero created successfully');
        return redirect()->route('hero.index');
    }
    //edit
    public function edit($id)
    {
        $hero = Hero::find($id);
        return view('backend.admin.hero.edit', compact('hero'));
    }
    //update
    public function update(Request $request, $id)
    {
            // $table->string('name')->nullable();
            // $table->string('title')->nullable();
            // $table->string('description')->nullable();
            // $table->string('image')->nullable();
            // //social links
            // $table->string('facebook')->nullable();
            // $table->string('twitter')->nullable();
            // $table->string('instagram')->nullable();
            // $table->string('linkedin')->nullable();
            // //another 
            // $table->string('YOE')->nullable();
            // $table->string('CV')->nullable();
            // $table->string('HC')->nullable();
            // $table->string('Location')->nullable();
            // //github
            // $table->string('github')->nullable();
            // //problem statement
            // $table->string('problem_statement')->nullable();
            // $table->string('problem_statement_image')->nullable();

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'YOE' => 'required',
            'CV' => 'file|mimes:pdf|max:2048',
            'HC' => 'file|mimes:pdf|max:2048',
            'Location' => 'required',
            'github' => 'required',
            'problem_statement' => 'required',
            'problem_statement_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $hero = Hero::find($id);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->image = $filename;
        }
        if($request->hasFile('CV'))
        {
            $file = $request->file('CV');
            $filename = time()+1 . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->CV = $filename;
        }
        if($request->hasFile('HC'))
        {
            $file = $request->file('HC');
            $filename = time()+1 . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->HC = $filename;
        }
        if($request->hasFile('problem_statement_image'))
        {
            $file = $request->file('problem_statement_image');
            $filename = time()+1 . '.' . $file->getClientOriginalExtension();
            $file->move('upload/hero/', $filename);
            $hero->problem_statement_image = $filename;
        }   
            $hero->name = $request->name;
            $hero->title = $request->title;
            $hero->description = $request->description;
            $hero->facebook = $request->facebook;
            $hero->twitter = $request->twitter;
            $hero->instagram = $request->instagram;
            $hero->linkedin = $request->linkedin;
            $hero->YOE = $request->YOE;
            $hero->Location = $request->Location;
            $hero->github = $request->github;
            $hero->problem_statement = $request->problem_statement;
            $hero->save();
            //notification
            $request->session()->flash('success', 'Hero updated successfully');
            return redirect()->route('hero.index');
        }
}
