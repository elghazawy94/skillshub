<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Mail\ContactResponseMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index(){
        $messages = Messages::orderBy('id' , 'DESC')->paginate(30);
        return view('admin.messages.index' , [
            'messages' => $messages
        ]);
    }

    public function show($id){
        $message = Messages::findorfail($id);
        return view('admin.messages.show' , [
            'message' => $message
        ]);
    }


    public function response($id , Request $request){
        $message = Messages::findorfail($id);
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $recevermail = $message->email;
        $name = $message->name;
        Mail::to($recevermail)->send(new ContactResponseMail($name , $request->subject , $request->body));
        $request->session()->flash('success' , 'send email successfuly');
        return back();
    }

    public function delete($id ,Request $request){
        try{
            $delete = Messages::findorfail($id);
            $delete->delete();
            $request->session()->flash('success' , 'message deleted successfuly');
        } catch(Exception $e){
            $request->session()->flash('error' , 'can not delete this message');
        }
        return back();
    }
}
