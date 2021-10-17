<?php

namespace App\Http\Controllers\admin;

use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Exception;


class SkillController extends Controller
{
    public function index(){
        $skills = Skill::orderBy('id' , 'DESC')->paginate(30);
        $categories = Category::select('id','name')->where('active' , 1)->get();
        $categories_edit = Category::select('id','name')->get();
        return view('admin.skills.index' , [
            'skills'     => $skills,
            'categories' => $categories,
            'categories_edit' => $categories_edit
        ]);
    }


    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'cat_id' => 'required|exists:categories,id',
            'image' => 'required|image|max:2048',
        ]);
        $path  = Storage::putFile("skills", $request->file('image'));
        Skill::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'category_id' => $request->cat_id,
            'img' => $path
        ]);
        $request->session()->flash('success' , 'row add successfuly');
        return back();
    }


    public function update(Request $request){
        $request->validate([
            'id'=> 'required|exists:skills,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'cat_id' => 'required|exists:skills,id',
            'image' => 'nullable|image|max:2048',
        ]);


        $skill = Skill::findorfail($request->id);
        $path = $skill->img;
        if($request->hasFile('image')){
            Storage::delete($skill->img);
            $path  = Storage::putFile("skills", $request->file('image'));
        }
        $skill->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ]),
            'category_id' => $request->cat_id,
            'img' => $path
        ]);
        $request->session()->flash('success' , 'skill updated successfuly');
        return back();
    }


    public function delete($id ,Request $request){
        try{
            $delete = Skill::findorfail($id);
            Storage::delete($delete->img);
            $delete->delete();
            $request->session()->flash('success' , 'row deleted successfuly');
        } catch(Exception $e){
            $request->session()->flash('error' , 'can not delete this row');
        }
        return back();
    }
}
