<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $exam = Exam::where('active', 1)->inRandomOrder()->limit(8)->get();
        return view('web.home.index' , [
            'exam' => $exam
        ]);
    }
}
