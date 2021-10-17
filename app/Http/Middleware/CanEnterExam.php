<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanEnterExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $examId = $request->route()->parameter('id');
        $user = Auth::user();
        $userExam = $user->exams()->where('exam_id' , '$examId')->first();
        if($userExam !== null And $userExam->pivot->status == 'closed'){
            return redirect( url('/'));
        }
        return $next($request);
    }
}
