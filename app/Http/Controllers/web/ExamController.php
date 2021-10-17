<?php

namespace App\Http\Controllers\web;

use Carbon\Carbon;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{

    public function show($id){
        $exam = Exam::findorfail($id);
        $user = Auth::user();
        $canEnterExam = true;
            if($user !== null){
                $userExam = $user->exams()->where('exam_id' , $id)->active()->first();
                if($userExam !== null And $userExam->pivot->status == 'closed'){
                    $canEnterExam = false;
                }
            }
        return view('web.exams.show',[
            'exam' => $exam,
            'canEnterExam' => $canEnterExam,
        ]);
    }

    public function start($examId , Request $request){
        $User = Auth::user();
        if(!$User->exams->contains($examId)){
            $User->exams()->attach($examId);
        }else{
            $User->exams()->updateExistingPivot($examId , [
                'status' => 'closed'
            ]);
        }
        $request->session()->flash("prev" , "start/$examId");
        return redirect( url('/exams/questions' , $examId) );
    }

    public function Questions($examId , Request $request){
        if(session('prev') !== "start/$examId"){
            return redirect( url("/exams/$examId"));
        }
        $request->session()->flash("prev" , "questions/$examId");
        $showExam = Exam::findorfail($examId);
        return view('web.exams.questions',[
            'show_exam' => $showExam,
        ]);
    }



    public function finished($examId , Request $request){
        if(session('prev') !== "questions/$examId"){
            return redirect( url("/exams/$examId"));
        }
        // validation

        $request->validate([
            'answers' => 'Required|array',
            'answers.*' => 'Required|in:1,2,3,4',
        ]);


        $exam = Exam::findorfail($examId);

        $points = 0;
        $answerCount = $exam->questions()->count();

        foreach($exam->questions as $question){
            if(isset($request->answers[$question->id])){
                $userAnswer = $request->answers[$question->id];
                $RightAnswer = $question->right_answer;

                if($userAnswer == $RightAnswer){
                    $points += 1;
                }
            }
        }

        // calc score

        $score = ($points / $answerCount) * 100;


        // calc time mints
        $user = Auth::user();
        $PivotRow = $user->exams()->where('exam_id' , $examId)->first();
        $StartTime = $PivotRow->pivot->created_at;
        $submitTme = Carbon::now();
        $time_mins = $submitTme->diffInMinutes($StartTime);
        if($time_mins > $PivotRow->durations_mins){
            $score =0;
        }

        // UPDATE

        $user->exams()->updateExistingPivot($examId , [
            'score' => $score,
            'time_mins' => $time_mins ,
        ]);
        $request->session()->flash("success" , "you finshed exam successfuly with score $score");
        return Redirect ( url('/exams/show' , $examId) );
    }

}
