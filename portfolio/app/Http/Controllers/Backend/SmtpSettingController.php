<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;

class SmtpSettingController extends Controller
{
    public function SmtpSetting()
    {
        $setting = SmtpSetting::find(1);
        if (!$setting) {
            $setting = new SmtpSetting();
            $setting->id = 1;
            $setting->save();
        }
        return view('backend.setting.smtp_update', compact('setting'));
    }

    public function UpdateSmtpSetting(Request $request)
    {
        $setting_id = $request->id;
        
        $setting = SmtpSetting::find($setting_id);
        if (!$setting) {
            $setting = new SmtpSetting();
            $setting->id = 1;
        }

        $setting->mailer = $request->mailer;
        $setting->host = $request->host;
        $setting->port = $request->port;
        $setting->username = $request->username;
        $setting->password = $request->password;
        $setting->encryption = $request->encryption;
        $setting->from_address = $request->from_address;
        
        $setting->save();

        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
