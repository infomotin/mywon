<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Resume;

class ResumeContorller extends Controller
{
    //index
    public function index()
    {
        $resumes = Resume::all();   
        return view('backend.admin.resume.index', compact('resumes'));
    }
    //create
    public function create(){
         return view('backend.admin.resume.create');
    }
    //store
    public function store(Request $request){
        $resume = new Resume();
        $resume->title = $request->title;
        $resume->company = $request->company;
        $resume->period = $request->period;
        $resume->start_date = $request->start_date;
        $resume->end_date = $request->end_date;
        $resume->order = $request->order;
        $resume->save();
        return redirect()->route('resume.index');
    }
    //edit
    public function edit($id){
        $resume = Resume::find($id);
        return view('backend.admin.resume.edit', compact('resume'));
    }
    //update
    public function update(Request $request, $id){
        $resume = Resume::find($id);
        $resume->title = $request->title;
        $resume->company = $request->company;
        $resume->period = $request->period;
        $resume->start_date = $request->start_date;
        $resume->end_date = $request->end_date;
        $resume->order = $request->order;
        $resume->save();
        return redirect()->route('resume.index');
    }
    //destroy
    public function destroy($id){
        $resume = Resume::find($id);
        $resume->delete();
        return redirect()->route('resume.index');
    }
}
