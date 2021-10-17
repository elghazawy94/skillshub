<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Exam;
use App\Models\Skill;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function index(){
        $exams = Exam::orderBy('id' , 'DESC')->paginate(30);
        return view('admin.exams.index' , [
            'exams'     => $exams,
        ]);
    }

    public function show($id){
        $exam = Exam::findorfail($id);
        return view('admin.exams.show',[
            'exam' => $exam
        ]);
    }

    public function showQuestions($id){
        $exam = Exam::findorfail($id);
        return view('admin.exams.show-questions',[
            'exam' => $exam
        ]);
    }

    public function create(){
        $exams = Exam::select('name' , 'id')->get();
        $skills = Skill::select('id','name')->get();
        return view('admin.exams.create',[
            "exams" => $exams ,
            "skills" => $skills
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name_en'        => 'required|string|max:50',
            'name_ar'        => 'required|string|max:50',
            'desc_en'        => 'required|string|max:5000',
            'desc_ar'        => 'required|string|max:5000',
            'skill_id'       => 'required|exists:skills,id',
            'img'            => 'required|image|max:2048',
            'questions_num'  => 'required|integer|min:1',
            'difficulty'     => 'required|integer|min:1|max:5',
            'durations_mins' => 'required|integer|min:1',
        ]);
        $path  = Storage::putFile("exams", $request->file('img'));
        $exam = exam::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'skill_id'        => $request->skill_id,
            'img'             => $path,
            'questions_num'   => $request->questions_num,
            'difficulty'      => $request->difficulty,
            'durations_mins'  => $request->durations_mins,
            'active'          => 0,
        ]);
        $request->session()->flash("prev" , "exam/$exam->id");
        return redirect( url("/dashboard/exams/{$exam->id}/questions/create") );
    }

    public function createQuestions($id){
        $exam = Exam::findorfail($id);
            if(session('prev') !== "exam/$exam->id"){
                return redirect( url("/dashboard/exams") );
            }
            return view("admin.exams.create-questions"  ,[
                "exam" => $exam
            ]);
    }

    public function storeQuestions($id , Request $request){
        $exam = Exam::findorfail($id);
        $request->validate([
            'titles'         => 'required|array',
            'titles.*'       => 'required|string|max:500',
            'right_answer'   => 'required|array',
            'right_answer.*' => 'required|in:1,2,3,4',
            'option_1s'      => 'required|array',
            'option_1s.*'    => 'required|string|max:255',
            'option_2s'      => 'required|array',
            'option_2s.*'    => 'required|string|max:255',
            'option_3s'      => 'required|array',
            'option_3s.*'    => 'required|string|max:255',
            'option_4s'      => 'required|array',
            'option_4s.*'    => 'required|string|max:255',
        ]);

        for ($i=0; $i < $exam->questions_num; $i++) {
            Question::create([
                'exam_id'       => $exam->id,
                'title'         => $request->titles[$i],
                'option_1'      => $request->option_1s[$i],
                'option_2'      => $request->option_2s[$i],
                'option_3'      => $request->option_3s[$i],
                'option_4'      => $request->option_4s[$i],
                'right_answer'  => $request->right_answer[$i],
            ]);
        }

        $exam->update([
            'active' => 1
        ]);
        $request->session()->flash('success' , 'create a new Exam Successfuly');
        return redirect( url("/dashboard/exams") );
    }

    public function edit($id){
        $exam = Exam::findorfail($id);
        $skills = Skill::select('id','name')->get();
        return view('admin.exams.edit' , [
            'exam' => $exam ,
            'skills' => $skills
        ]);
    }

    public function update($id , Request $request){
        $exam = Exam::findorfail($id);
        $request->validate([
            'name_en'        => 'required|string|max:50',
            'name_ar'        => 'required|string|max:50',
            'desc_en'        => 'required|string|max:5000',
            'desc_ar'        => 'required|string|max:5000',
            'skill_id'       => 'required|exists:skills,id',
            'img'            => 'nullable|image|max:2048',
            'difficulty'     => 'required|integer|min:1|max:5',
            'durations_mins' => 'required|integer|min:1',
        ]);
        $path = $exam->img;
        if($request->hasFile('img')){
            Storage::delete($exam->img);
            $path  = Storage::putFile("exams", $request->file('img'));
        }
        $exam->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'skill_id'        => $request->skill_id,
            'img'             => $path,
            'difficulty'      => $request->difficulty,
            'durations_mins'  => $request->durations_mins,
        ]);
        $request->session()->flash('success' , 'exam updated successfuly');
        return back();
    }


    public function updateQuestion(Request $request){
        $request->validate([
            'id'            => 'required|exists:questions,id',
            'title'         => 'required|string|max:500',
            'right_answer'  => 'required|in:1,2,3,4',
            'option_1'      => 'required|string|max:255',
            'option_2'      => 'required|string|max:255',
            'option_3'      => 'required|string|max:255',
            'option_4'      => 'required|string|max:255',
        ]);
        $queston = Question::findorfail($request->id);
        $queston->update([
            'title'         => $request->title,
            'option_1'      => $request->option_1,
            'option_2'      => $request->option_2,
            'option_3'      => $request->option_3,
            'option_4'      => $request->option_4,
            'right_answer'  => $request->right_answer,
        ]);
        $request->session()->flash('success' , 'question updated successfuly');
        return back();
    }


    public function delete($id ,Request $request){
        try{
            $delete = Exam::findorfail($id);
            Storage::delete($delete->img);
            $delete->delete();
            $request->session()->flash('success' , 'Exam deleted successfuly');
        } catch(Exception $e){
            $request->session()->flash('error' , 'can not delete this Exam');
        }
        return back();
    }


}
