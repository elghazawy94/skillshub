<?php

namespace App\Http\Controllers\admin;

use App\Models\Messages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $getCategoryCount = DB::table('categories')->count();
        $getSkillsCount = DB::table('skills')->count();
        $getExamsCount = DB::table('exams')->count();
        $getUsersCount = DB::table('users')->count();
        $messages = Messages::orderBy('id' , 'DESC')->limit(10)->get();
        return view('admin.home.index' , [
            'getCategoryCount' => $getCategoryCount,
            'getSkillsCount' => $getSkillsCount ,
            'getExamsCount' => $getExamsCount ,
            'getUsersCount' => $getUsersCount ,
            'messages' => $messages
        ]);
    }
}
