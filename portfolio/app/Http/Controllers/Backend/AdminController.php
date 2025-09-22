<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    //logout
    public function editProfile()
    {
        $admin = User::find(Auth::user()->id);
        // dd($admin);
        return view('/backend/admin/editprofile', compact('admin'));
    }
    //updateProfile
    public function updateProfile(Request $request, $id)
    {
        // dd($request->all());
        //     $request->validate([
        //     'name' => 'required',
        //     'username' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'email' => 'required',
        //     'role' => 'required',
        //     'profile_photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
            // $table->string('name');
            // $table->string('username')->unique()->nullable();
            // $table->string('phone')->unique()->nullable();
            // $table->string('address')->nullable();
            // $table->string('email')->unique();
            // $table->enum('role', ['admin', 'user'])->default('user');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->string('profile_photo_path')->nullable();
        $admin = User::find($id);
        if($request->hasFile('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/admin_images/', $filename);
            $admin->profile_photo_path = $filename;
        }
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->save();
        //notification
        $request->session()->flash('success', 'Profile Updated Successfully');
        return redirect()->route('admin.edit.profile');
    }

    //AdminLogout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
