<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function show($id){
        $categories = Category::select('id' , 'name')->get();
        $skills = Skill::findorfail($id);
        return view('web.skills.show' , [
            'categories' => $categories ,
            'skills' => $skills
        ]);
    }
}
