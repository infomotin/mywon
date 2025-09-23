<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MySkills;

class MySkillContorller extends Controller
{
    public function index()
    {
        $myskills = MySkills::all();
        return view('backend.admin.myskill.index', compact('myskills'));
    }
    public function create()
    {
        return view('backend.admin.myskill.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'level' => 'required',
            'order' => 'required',
        ]);
        MySkills::create($request->all());
        return redirect()->route('myskill.index')->with('success', 'MySkill created successfully');
    }
    public function edit($id)
    {
        $myskill = MySkills::findOrFail($id);
        return view('backend.admin.myskill.edit', compact('myskill'));
    }
    public function update(Request $request, $id)
    {
        $myskill = MySkills::findOrFail($id);
        $myskill->update($request->all());
        return redirect()->route('myskill.index')->with('success', 'MySkill updated successfully');
    }
    public function destroy($id)
    {
        MySkills::findOrFail($id)->delete();
        return redirect()->route('myskill.index')->with('success', 'MySkill deleted successfully');
    }   
}
