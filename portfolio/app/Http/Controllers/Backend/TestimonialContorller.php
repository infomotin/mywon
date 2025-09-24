<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class TestimonialContorller extends Controller
{
    //index
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.admin.testimonial.index', compact('testimonials'));
    }

    //create
    public function create()
    {
        return view('backend.admin.testimonial.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quote' => 'required',
            'name' => 'required',
            'designation' => 'required',
        ]);

        $testimonial = new Testimonial();
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            $testimonial->logo = $filename;
        }
        if($request->hasFile('user_image'))
        {
            $file = $request->file('user_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/user_image/', $filename);
            $testimonial->user_image = $filename;
        }
        $testimonial->quote = $request->quote;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->save();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully');
    }

    //edit
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.admin.testimonial.edit', compact('testimonial'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'quote' => 'required',
            'name' => 'required',
            'designation' => 'required',
        ]); 

        $testimonial = Testimonial::find($id);
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            $testimonial->logo = $filename;
        }
        if($request->hasFile('user_image'))
        {
            $file = $request->file('user_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/user_image/', $filename);
            $testimonial->user_image = $filename;
        }
        $testimonial->quote = $request->quote;
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->save();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully');
    }
}
