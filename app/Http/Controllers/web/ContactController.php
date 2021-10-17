<?php

namespace App\Http\Controllers\web;

use App\Models\Setting;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function index(){
        $setting = Setting::select('email','phone')->first();
        return view('web.contact.index', [
            'setting'=>$setting
        ]);
    }



    public function send(Request $request){
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255',
            'subject'=> 'nullable|string|max:255',
            'message'=> 'required|string'
        ]);

        Messages::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'body'=> $request->message,
        ]);

        $data = ['success' => 'your message sent successfully'];
        return Response::json($data);
    }


}
