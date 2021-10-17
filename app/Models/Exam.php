<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

        // Relationships

    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }


    public function users(){
        return $this->belongsToMany(User::class)
            ->withPivot('score' , 'time_mins' , 'status')
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('active' , 1);
    }


        // web

        public function name(){
            if(App::getLocale() == "en"){
                return json_decode($this->name)->en;
            }
            return json_decode($this->name)->ar;
        }

        public function desc(){
            if(App::getLocale() == "en"){
                return json_decode($this->desc)->en;
            }
            return json_decode($this->desc)->ar;
        }

}
