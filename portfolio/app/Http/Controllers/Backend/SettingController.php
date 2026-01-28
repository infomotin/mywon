<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('backend.setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting_id = $request->id;
        $setting = Setting::find($setting_id);

        if (!$setting) {
             // If no setting exists, create one (fallback, though migration suggests one should be seeded or created on first save)
             // However, for update logic, let's assume we might need to create if empty
             $setting = new Setting();
        }

        // Handle Logo Upload
        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path('upload/setting/' . $setting->logo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/setting'), $filename);
            $setting->logo = $filename;
        }

        // Handle Favicon Upload
        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            @unlink(public_path('upload/setting/' . $setting->favicon));
            $filename = date('YmdHi') . 'favicon' . $file->getClientOriginalName();
            $file->move(public_path('upload/setting'), $filename);
            $setting->favicon = $filename;
        }

        $setting->website_name = $request->website_name;
        $setting->meta_title = $request->meta_title;
        $setting->meta_description = $request->meta_description;
        $setting->meta_keywords = $request->meta_keywords;
        
        $setting->save();

        $notification = array(
            'message' => 'Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
