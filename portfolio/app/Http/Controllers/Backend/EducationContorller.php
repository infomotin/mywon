<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationContorller extends Controller
{
    //index
    public function index()
    {
        $education = Education::all();
        return view('backend.admin.education.index', compact('education'));
    }

    //create
    public function create()
    {
        $education = Education::all();
        return view('backend.admin.education.create', compact('education'));
    }

    //store
    public function store(Request $request)
    {
        $education = new Education();
        $education->title = $request->title;
        $education->institution = $request->institution;
        $education->period = $request->period;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->order = $request->order;
        $education->save();
        return redirect()->route('education.index')->with('success', 'Education Added Successfully');
    }

    //edit
    public function edit($id)
    {
        $education = Education::find($id);
        return view('backend.admin.education.edit', compact('education'));
    }

    //update
    public function update(Request $request, $id)
    {
        $education = Education::find($id);
        $education->title = $request->title;
        $education->institution = $request->institution;
        $education->period = $request->period;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->order = $request->order;
        $education->save();
        return redirect()->route('education.index')->with('success', 'Education Updated Successfully');
    }

    //destroy
    public function destroy($id)
    {
        $education = Education::find($id);
        $education->delete();
        return redirect()->route('education.index')->with('success', 'Education Deleted Successfully');
    }
}
