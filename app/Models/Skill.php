<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'avtive', 'created_at', 'updated_at'];


    // Relationships

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function exams(){
        return $this->hasMany(exam::class);
    }

    public function getStudentsCount(){
        $studentNum = 0;
        foreach ($this->exams as $exam) {
            $studentNum += $exam->users()->count();
        }
        return $studentNum;
    }


    // web

    public function name(){
        if(App::getLocale() == "en"){
            return json_decode($this->name)->en;
        }
        return json_decode($this->name)->ar;
    }
}
