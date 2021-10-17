<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::select()->first();
        return view('admin.setting.index' ,[
            'setting' => $setting
        ]);
    }

    public function update($id , Request $request){
        $setting = Setting::findorfail($id);
        $request->validate([
            'email'     => 'required|email|max:50',
            'phone'     => 'required|string|max:50',
            'facebook'  => 'required|string|max:5000',
            'twitter'   => 'required|string|max:5000',
            'instegram' => 'required|string|max:5000',
            'youtube'   => 'required|string|max:5000',
            'linkedin'  => 'required|string|max:5000',
        ]);

        $setting->update([
            'email'     => $request->email,
            'phone'     => $request->phone,
            'twitter'   => $request->twitter,
            'instegram' => $request->instegram,
            'youtube'   => $request->youtube,
            'linkedin'  => $request->linkedin,
        ]);
        $request->session()->flash('success' , 'setting updated successfuly');
        return back();
    }
}
