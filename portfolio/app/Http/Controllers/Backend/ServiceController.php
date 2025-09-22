<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Services;

class ServiceController extends Controller
{
    //index
    public function index()
    {
        $services = Services::all();
        return view('backend.admin.service.index', compact('services'));
    }
    //create
    public function create()
    {
        return view('backend.admin.service.create');
    }
    //store
    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required',
            'service_description' => 'required',
            'service_image' => 'required',
        ]);
        $service = new Services();
        if($request->hasFile('service_image'))
        {
            $file = $request->file('service_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/service/', $filename);
            $service->service_image = $filename;
        }
        $service->service_title = $request->service_title;
        $service->service_description = $request->service_description;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }
    //edit
    public function edit($id)
    {
        $service = Services::findOrFail($id);
        return view('backend.admin.service.edit', compact('service'));
    }
    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_title' => 'required',
            'service_description' => 'required',
            'service_image' => 'required',
        ]);
        $service = Services::findOrFail($id);
        if($request->hasFile('service_image'))
        {
            $file = $request->file('service_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/service/', $filename);
            $service->service_image = $filename;
        }
        $service->service_title = $request->service_title;
        $service->service_description = $request->service_description;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service updated successfully');
    }
    //popup
    public function popup($id)
    {
        $service = Services::findOrFail($id);
        dd($service);
        return view('frontend.body.components.servicePopup', compact('service'));
    }
    //destroy
    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service deleted successfully');
    }
}
