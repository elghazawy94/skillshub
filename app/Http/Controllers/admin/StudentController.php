<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(){
        $studen_Role = Role::where('name' , 'student')->first();
        $students = User::select('id', 'name', 'email' ,'email_verified_at','created_at')->where('role_id' , $studen_Role->id)->orderBy('id' , 'DESC')->paginate(10);
        return view('admin.students.index' , [
            'students' => $students
        ]);
    }

    public function show($id){
        $showUser = User::findorfail($id);
        $exams = $showUser->exams;
        return view('admin.students.show',[
            'showUser' => $showUser ,
            'StudentExams' => $exams
        ]);
    }

    public function openExam($studentId , $examId){
        $student = User::findorfail($studentId);
        $student->exams()->updateExistingPivot($examId , [
            'status' => 'opend'
        ]);
        return back();
    }
    public function closeExam($studentId , $examId){
        $student = User::findorfail($studentId);
        $student->exams()->updateExistingPivot($examId , [
            'status' => 'closed'
        ]);
        return back();
    }
}
