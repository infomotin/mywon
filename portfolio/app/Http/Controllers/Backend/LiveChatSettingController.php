<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveChatSetting;

class LiveChatSettingController extends Controller
{
    public function LiveChatSetting()
    {
        $setting = LiveChatSetting::find(1);
        if (!$setting) {
            $setting = new LiveChatSetting();
            $setting->id = 1;
            $setting->save();
        }
        return view('backend.setting.live_chat', compact('setting'));
    }

    public function UpdateLiveChatSetting(Request $request)
    {
        $setting_id = $request->id;
        
        $setting = LiveChatSetting::find($setting_id);
        if (!$setting) {
            $setting = new LiveChatSetting();
            $setting->id = 1;
        }

        $setting->whatsapp_number = $request->whatsapp_number;
        $setting->whatsapp_status = $request->whatsapp_status ? 1 : 0;
        $setting->tawk_to_script = $request->tawk_to_script;
        $setting->tawk_to_status = $request->tawk_to_status ? 1 : 0;
        
        $setting->save();

        $notification = array(
            'message' => 'Live Chat Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
