<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $UserExams = Auth::user()->exams;
        return view('web.profile.index' , [
            'UserExams' => $UserExams
        ]);
    }
}
