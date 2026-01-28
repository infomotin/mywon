<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThemeSetting;

class ThemeSettingController extends Controller
{
    public function index()
    {
        $setting = ThemeSetting::first();
        
        if (!$setting) {
            $setting = ThemeSetting::create([
                'primary_color' => '#8750f7',
                'secondary_color' => '#2a1454',
                'background_color' => '#0f0715',
                'text_color' => '#ffffff',
                'theme_mode' => 'dark',
            ]);
        }
        
        return view('backend.admin.theme.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = ThemeSetting::first();
        
        if (!$setting) {
            $setting = new ThemeSetting();
        }

        // Handle boolean checkboxes
        $data = $request->all();
        $data['show_hero'] = $request->has('show_hero');
        $data['show_services'] = $request->has('show_services');
        $data['show_portfolio'] = $request->has('show_portfolio');
        $data['show_resume'] = $request->has('show_resume');
        $data['show_skills'] = $request->has('show_skills');
        $data['show_testimonial'] = $request->has('show_testimonial');
        $data['show_blog'] = $request->has('show_blog');
        $data['show_contact'] = $request->has('show_contact');
        $data['show_footer'] = $request->has('show_footer');

        $setting->update($data);

        return redirect()->back()->with('success', 'Theme settings updated successfully');
    }
}
